<?php

namespace App\Http\Controllers;

use App\Setting;
use App\Message;
use Illuminate\Support\Facades\Validator;
use App\Brand;
use App\Category;
use App\Review;
use App\Order;
use App\SubCat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BrandController extends Controller
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
        return view('admin.brands.index')->with([
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
        $brands = Brand::orderBy('created_at', 'desc')->get();
        foreach ($brands as $brand)
        {
            $brand['avatar'] = '<img src="' . asset('/storage/brands/' . $brand['avatar']) . '"style="max-height: 60px; max-width: 70px;">';
        }
        return Datatables::of($brands)->addColumn('actions', function ($brand)
        {
            return '<button class="btn btn-xs btn-default view" id="' . $brand->id . '"><i class="glyphicon glyphicon-eye-open"></i> View</button>
            <button class="btn btn-xs btn-primary edit" id="' . $brand->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</button>
            <button class="btn btn-xs btn-danger delete" id="' . $brand->id . '"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
            ->addColumn('checkboxes', '<input type="checkbox" name="brand_checkbox[]" class="brand_checkbox"  value="{{$id}}" />')
            ->addColumn('sub_cat_count', function ($brand)
            {
                return count($brand->sub_cats);
            })
            ->rawColumns(['avatar', 'actions', 'checkboxes'])->make(true);
    }

    //Get Brand data for the Edit Modal
    public function fetch_single(Request $request)
    {
        $output = null;
        $selected_subcategories = [];
        //find brand
        $brand = Brand::find($request['id']);

        //get selected subcategories ids
        foreach ($brand->sub_cats as $sub_cat)
        {
            $selected_subcategories[] = $sub_cat->id;
        }

        //Building the output markup layout
        $categories = Category::orderBy('name', 'asc')->get();
        foreach ($categories as $category)
        {
            $output .= '<optgroup label="' . $category['name'] . '">';
            foreach ($category->sub_cats as $sub_cat)
            {
                //Apply selected attr to the selected options
                if (in_array($sub_cat['id'], $selected_subcategories))
                {
                    $output .= '<option value="' . $sub_cat['id'] . '" selected>' . $sub_cat['name'] . '</option>';
                } else
                {
                    $output .= '<option value="' . $sub_cat['id'] . '">' . $sub_cat['name'] . '</option>';
                }
            }
            $output .= '</optgroup>';
        }
        return response()->json(['info' => $brand, 'categories' => $output]);
    }


    //Store or Update
    public function store(Request $request)
    {
        $rules = [
            'name'        => 'required|string|min:5|max:100',
            'categories'  => 'required',
            'description' => 'required',
            'avatar'      => 'nullable|image|max:1999'
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
                    $request->file('avatar')->storeAs('public/brands', $fileNameToStore);
                } else
                {
                    $fileNameToStore = 'brand-default.png';
                }
                $brand = Brand::create([
                    'name'        => $request['name'],
                    'description' => $request['description'],
                    'avatar'      => $fileNameToStore,
                    'slug'        => str_slug($request['name'])
                ]);

                $brand->sub_cats()->attach($request['categories']);
                $success_output = "<div class='alert alert-success'>Created new brand successfully.</div>";

                //If the request is update Process Update Request
            } elseif ($request['form_action'] == 'update')
            {
                $brand = Brand::find($request['brand_id']);
                if ($request->hasFile('avatar'))
                {
                    $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('avatar')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    //Store The Image
                    $request->file('avatar')->storeAs('public/brands', $fileNameToStore);
                    if ($brand['avatar'] != 'brand-default.png')
                    {
                        \Storage::delete('/public/brands/' . $brand['avatar']);
                    }
                } else
                {
                    $fileNameToStore = 'brand-default.png';
                    if ($brand['avatar'] != 'brand-default.png')
                    {
                        \Storage::delete('/public/brands/' . $brand['avatar']);
                    }
                }

                $brand->update([
                    'name'        => $request['name'],
                    'description' => $request['description'],
                    'avatar'      => $fileNameToStore,
                    'slug'        => str_slug($request['name'])
                ]);
                //Sync changes on the pivot relation table
                $brand->sub_cats()->sync($request['categories']);
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
        $brand = Brand::find($request['id']);
        $avatar = $brand['avatar'];
        //fetch brand's sub categories
        $categories = $brand->sub_cats;
        $output = null;
        foreach ($categories as $category)
        {
            $output .= '<div style="margin: 5px;display: inline-block" class="label label-info">' . $category['name'] . '</div>';
        }
        $info = '
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Name:</strong>' . $brand['name'] . '</li>
                  <li style="display: inline-block; height:auto" class="list-group-item form-control"><strong class="col-md-4">Categories:</strong><div class="col-md-8">' . $output . '</div></li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Slug: </strong>' . $brand['slug'] . '</li>
                  <li style="display: inline-block;height:auto" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Description:</strong><div class="col-lg-8 col-md-8" style="height:auto">' . $brand['description'] . '</div></li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Created at: </strong>' . $brand['created_at'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-md-4">Updated at: </strong>' . $brand['updated_at'] . '</li>
        ';
        return response()->json(['info' => $info, 'avatar' => $avatar]);
    }

    //Remove single data record
    public function removeData(Request $request)
    {
        $brand = Brand::find($request['id']);

        if ($brand->delete())
        {
            $brand->sub_cats()->detach();
            if ($brand['avatar'] != 'brand-default.png')
            {
                \Storage::delete('/public/brands/' . $brand['avatar']);
            }
            return response()->json('Successfully deleted.');
        }
    }

    //Remove bulk data records
    public function removeBulk(Request $request)
    {
        $brands_id_array = $request['id'];
        foreach ($brands_id_array as $brand_id)
        {
            $brand = Brand::find($brand_id);
            if ($brand->delete())
            {
                $brand->sub_cats()->detach();
                if ($brand['avatar'] != 'brand-default.png')
                {
                    \Storage::delete('/public/brands/' . $brand['avatar']);
                }
            }
        }
        return response()->json('Data deleted successfully.');
    }

    //Fetch categories and sub categories, to be used within the Create New Modal
    public function categoriesSelect()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $output = null;

        foreach ($categories as $category)
        {
            $output .= '<optgroup label="' . $category['name'] . '">';
            foreach ($category->sub_cats as $sub_cat)
            {
                $output .= '<option value="' . $sub_cat['id'] . '">' . $sub_cat['name'] . '</option>';
            }
            $output .= '</optgroup>';
        }

        return response()->json($output);
    }
}
