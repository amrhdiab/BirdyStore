<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Location;
use App\Message;
use App\Setting;
use App\Review;
use App\Order;
use Illuminate\Support\Facades\Validator;
use App\Store;
use App\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StoreController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        //get unread user messages for the navbar
        $messages = Message::where('is_read',0)->take(4)->orderBy('created_at','desc')->get();
        //get all unread messages count for the navbar
        $messagesCount = Message::where('is_read',0)->count();
        //get the count of orders with waiting status for sidebar menu
        $waitingOrders = Order::where('status','Waiting')->count();
        //get the count of reviews with waiting status for sidebar menu
        $waitingReviews = Review::where('status','Waiting')->count();
        return view('admin.stores.index')->with([
            'settings' => $settings,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }

    //Fetch Initial brands data to display via DataTables
    public function fetchData()
    {
        $stores = Store::orderBy('created_at', 'desc')->get();
        foreach ($stores as $store)
        {
            $store['avatar'] = '<img src="' . asset('/storage/stores/' . $store['avatar']) . '"style="max-height: 60px; max-width: 70px;">';
        }
        return Datatables::of($stores)->addColumn('actions', function ($store)
        {
            return '<button class="btn btn-xs btn-default view" id="' . $store->id . '"><i class="glyphicon glyphicon-eye-open"></i> View</button>
            <button class="btn btn-xs btn-primary edit" id="' . $store->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</button>
            <button class="btn btn-xs btn-danger delete" id="' . $store->id . '"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
            ->addColumn('checkboxes', '<input type="checkbox" name="store_checkbox[]" class="store_checkbox"  value="{{$id}}" />')
            ->addColumn('sub_cat_count', function ($store)
            {
                return count($store->sub_cats);
            })
            ->rawColumns(['avatar', 'actions', 'checkboxes'])->make(true);
    }

    //Get Store data for the Edit Modal
    public function fetch_single(Request $request)
    {
        $categories_Output = null;
        $brands_Output = null;
        $selected_subcategories = [];
        $selected_brands = [];
        //find the store
        $store = Store::find($request['id']);

        //get selected subcategories ids
        foreach ($store->sub_cats as $sub_cat)
        {
            $selected_subcategories[] = $sub_cat->id;
        }
        //get selected brands ids
        foreach ($store->brands as $brand)
        {
            $selected_brands[] = $brand->id;
        }

        //Building the categories output markup layout
        $categories = Category::orderBy('name', 'asc')->get();
        foreach ($categories as $category)
        {
            $categories_Output .= '<optgroup label="' . $category['name'] . '">';
            foreach ($category->sub_cats as $sub_cat)
            {
                //Apply (selected) attr to the selected options
                if (in_array($sub_cat['id'], $selected_subcategories))
                {
                    $categories_Output .= '<option value="' . $sub_cat['id'] . '" selected>' . $sub_cat['name'] . '</option>';
                } else
                {
                    $categories_Output .= '<option value="' . $sub_cat['id'] . '">' . $sub_cat['name'] . '</option>';
                }
            }
            $categories_Output .= '</optgroup>';
        }

        //Building the brands output markup layout
        $brands = Brand::orderBy('name', 'asc')->get();
        foreach ($brands as $brand)
        {
            //Apply (selected) attr to the selected options
            if (in_array($brand['id'], $selected_brands))
            {
                $brands_Output .= '<option value="' . $brand['id'] . '" selected>' . $brand['name'] . '</option>';
            } else
            {
                $brands_Output .= '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
            }
        }

        //Governorate Selection
        //Get all Governorates
        $governorates = Location::groupBy('governorate')->orderBy('governorate', 'asc')->get();
        $governorates_output = '<option value="">Select Governorate..</option>';
        foreach ($governorates as $governorate)
        {
            if ($store['governorate'] == $governorate['governorate'])
            {
                $governorates_output .= '<option value="' . $governorate['governorate'] . '" selected >' . $governorate['governorate'] . '</option>';
            } else
            {
                $governorates_output .= '<option value="' . $governorate['governorate'] . '">' . $governorate['governorate'] . '</option>';
            }
        }

        //Cities Selection
        //Get all Cities
        $cities_output = '<option value="">Select City..</option>';
        $cities = Location::groupBy('city')->orderBy('city', 'asc')->get();
        foreach ($cities as $city)
        {
            if ($store['city'] == $city['city'])
            {
                $cities_output .= '<option value="' . $city['city'] . '" selected >' . $city['city'] . '</option>';
            } else
            {
                $cities_output .= '<option value="' . $city['city'] . '">' . $city['city'] . '</option>';
            }
        }

        return response()->json([
            'info'   => $store, 'categories' => $categories_Output,
            'brands' => $brands_Output, 'governorate' => $governorates_output,
            'city'   => $cities_output
        ]);
    }


    //Store or Update
    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required|string|min:5|max:50',
            'contact_email'  => 'required|email',
            'contact_number' => 'required|numeric',
            'website'        => 'required',
            'governorate'    => 'required',
            'city'           => 'required',
            'address'        => 'required',
            'working_hours'  => 'required',
            'lat'            => 'required|numeric',
            'lng'            => 'required|numeric',
            'categories'     => 'required',
            'brands'         => 'required',
            'avatar'         => 'nullable|image|max:1999'
        ];
        $validation = Validator::make($request->all(), $rules);
        $errors_output = [];
        $success_output = '';
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $errors_output[] = $messages[0];
            }
        } else
        {
            //Check if the request is store, if so perform storing
            if ($request['form_action'] == 'insert')
            {
                //Check if it has an image file
                if ($request->hasFile('avatar'))
                {
                    $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('avatar')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    //Store The Image
                    $request->file('avatar')->storeAs('public/stores', $fileNameToStore);
                } else
                {
                    $fileNameToStore = 'store-default.png';
                }

                //Get the location_id based on the selected city
                $location = Location::where('city', $request['city'])->first();
                $store = Store::create([
                    'name'           => $request['name'],
                    'contact_email'  => $request['contact_email'],
                    'contact_number' => $request['contact_number'],
                    'website'        => $request['website'],
                    'governorate'    => $request['governorate'],
                    'city'           => $request['city'],
                    'address'        => $request['address'],
                    'working_hours'  => $request['working_hours'],
                    'lat'            => $request['lat'],
                    'lng'            => $request['lng'],
                    'location_id'    => $location->id,
                    'avatar'         => $fileNameToStore,
                    'slug'           => str_slug($request['name'])
                ]);

                $store->sub_cats()->attach($request['categories']);
                $store->brands()->attach($request['brands']);
                $success_output = "<div class='alert alert-success'>Created new store successfully.</div>";

                //If the request is update Process Update Request
            } elseif ($request['form_action'] == 'update')
            {
                $store = Store::find($request['store_id']);
                if ($request->hasFile('avatar'))
                {
                    $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('avatar')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    //Store The Image
                    $request->file('avatar')->storeAs('public/stores', $fileNameToStore);
                    if ($store['avatar'] != 'store-default.png')
                    {
                        \Storage::delete('/public/stores/' . $store['avatar']);
                    }
                } else
                {
                    $fileNameToStore = 'store-default.png';
                    if ($store['avatar'] != 'store-default.png')
                    {
                        \Storage::delete('/public/stores/' . $store['avatar']);
                    }
                }

                //Get the location_id based on the selected city
                $location = Location::where('city', $request['city'])->first();
                $store->update([
                    'name'           => $request['name'],
                    'contact_email'  => $request['contact_email'],
                    'contact_number' => $request['contact_number'],
                    'website'        => $request['website'],
                    'governorate'    => $request['governorate'],
                    'city'           => $request['city'],
                    'address'        => $request['address'],
                    'working_hours'  => $request['working_hours'],
                    'lat'            => $request['lat'],
                    'lng'            => $request['lng'],
                    'location_id'    => $location->id,
                    'avatar'         => $fileNameToStore,
                    'slug'           => str_slug($request['name'])
                ]);
                //Sync changes on the pivot relation table
                $store->sub_cats()->sync($request['categories']);
                $store->brands()->sync($request['brands']);
            }
        }

        $output = [
            'error'   => $errors_output,
            'success' => $success_output,
        ];

        return response()->json($output);
    }

    //Fetch data for view
    public function view(Request $request)
    {
        $categoriesOutput = null;
        $brandsOutput = null;
        $store = Store::find($request['id']);
        $avatar = $store['avatar'];
        //fetch store's sub categories
        $categories = $store->sub_cats;
        foreach ($categories as $category)
        {
            $categoriesOutput .= '<div style="margin: 5px;display: inline-block" class="label label-info">' . $category['name'] . '</div>';
        }

        //fetch store's brands
        $brands = $store->brands;
        foreach ($brands as $brand)
        {
            $brandsOutput .= '<div style="margin: 5px;display: inline-block" class="label label-success">' . $brand['name'] . '</div>';
        }
        $info = '
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Name:</strong>' . $store['name'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Website:</strong>' . $store['website'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Email:</strong>' . $store['contact_email'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Phone:</strong>' . $store['contact_number'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Location Coords:</strong><span class="text text-primary">Lat:</span> ' . $store['lat'] . ' -  <span class="text text-primary">Lng:</span>' . $store['lng'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Governorate:</strong>' . $store['governorate'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">City:</strong>' . $store['city'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Address:</strong>' . $store['address'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Working Hours:</strong>' . $store['working_hours'] . '</li>
                  <li style="display: inline-block; height:auto" class="list-group-item form-control"><strong class="col-md-4">Categories:</strong><div class="col-md-8">' . $categoriesOutput . '</div></li>
                  <li style="display: inline-block; height:auto" class="list-group-item form-control"><strong class="col-md-4">Brands:</strong><div class="col-md-8">' . $brandsOutput . '</div></li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Slug: </strong>' . $store['slug'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Created at: </strong>' . $store['created_at'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Updated at: </strong>' . $store['updated_at'] . '</li>
        ';
        return response()->json(['info' => $info, 'avatar' => $avatar]);
    }

    //Remove single data record
    public function removeData(Request $request)
    {
        $store = Store::find($request['id']);

        if ($store->delete())
        {
            $store->sub_cats()->detach();
            $store->brands()->detach();
            if ($store['avatar'] != 'store-default.png')
            {
                \Storage::delete('/public/stores/' . $store['avatar']);
            }
            return response()->json('Successfully deleted.');
        }
    }

    //Remove bulk data records
    public function removeBulk(Request $request)
    {
        $stores_id_array = $request['id'];
        foreach ($stores_id_array as $store_id)
        {
            $store = Store::find($store_id);
            if ($store->delete())
            {
                $store->sub_cats()->detach();
                $store->brands()->detach();
                if ($store['avatar'] != 'store-default.png')
                {
                    \Storage::delete('/public/stores/' . $store['avatar']);
                }
            }
        }
        return response()->json('Data deleted successfully.');
    }

    //Fetch categories, sub categories,and brands to be used within the Create New Modal
    public function dataSelect()
    {
        //Get all categories
        $categories = Category::orderBy('name', 'asc')->get();
        $allCategories = null;

        foreach ($categories as $category)
        {
            $allCategories .= '<optgroup label="' . $category['name'] . '">';
            foreach ($category->sub_cats as $sub_cat)
            {
                $allCategories .= '<option value="' . $sub_cat['id'] . '">' . $sub_cat['name'] . '</option>';
            }
            $allCategories .= '</optgroup>';
        }

        //Get all brands
        $brands = Brand::orderBy('name', 'asc')->get();
        $allBrands = null;

        foreach ($brands as $brand)
        {
            $allBrands .= '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
        }

        //Get all Governorates
        $governorates = Location::groupBy('governorate')->orderBy('governorate', 'asc')->get();
        $allGovernorates = '<option value="">Select Governorate..</option>';
        foreach ($governorates as $governorate)
        {
            $allGovernorates .= '<option value="' . $governorate['governorate'] . '">' . $governorate['governorate'] . '</option>';
        }

        return response()->json(['allCategories' => $allCategories, 'allGovernorates' => $allGovernorates, 'allBrands' => $allBrands]);
    }

    public function selectCity(Request $request)
    {
        $cities_output = '<option value="">Select City..</option>';
        $cities = Location::where('governorate', $request['value'])->groupBy('city')->get();
        foreach ($cities as $city)
        {
            $cities_output .= '<option value="' . $city['city'] . '">' . $city['city'] . '</option>';
        }
        return response()->json($cities_output);
    }
}
