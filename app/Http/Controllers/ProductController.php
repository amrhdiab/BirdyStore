<?php

namespace App\Http\Controllers;

use App\Product;
use App\Setting;
use App\Store;
use App\Message;
use App\Brand;
use App\Review;
use App\Order;
use App\SubCat;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
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
        return view('admin.products.index')->with([
            'settings' => $settings,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }

    //Fetch Initial products data to display via DataTables
    public function fetchData()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        foreach ($products as $product)
        {
            $product['featured_image'] = '<img src="' . asset('/storage/products/' . $product['featured_image']) . '"style="max-height: 60px; max-width: 70px;">';
            if ($product['is_featured'])
            {
                $product['is_featured'] = '<span class="label label-success">Yes</span>';
            } else
            {
                $product['is_featured'] = '<span class="label label-warning">No</span>';
            }

            if ($product['has_offer'])
            {
                $product['has_offer'] = '<span class="label label-success">Yes</span>';
            } else
            {
                $product['has_offer'] = '<span class="label label-warning">No</span>';
            }
        }
        return Datatables::of($products)->addColumn('actions', function ($product)
        {
            return '<button class="btn btn-xs btn-default view" id="' . $product->id . '"><i class="glyphicon glyphicon-eye-open"></i> View</button>
            <button class="btn btn-xs btn-primary edit" id="' . $product->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</button>
            <button class="btn btn-xs btn-danger delete" id="' . $product->id . '"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
            ->addColumn('checkboxes', '<input type="checkbox" name="product_checkbox[]" class="product_checkbox"  value="{{$id}}" />')
            ->rawColumns(['featured_image', 'actions', 'checkboxes', 'is_featured', 'has_offer'])->make(true);
    }

    //Get product data for the Edit Modal
    public function fetch_single(Request $request)
    {
        $stores_Output = null;
        $category_Output = null;
        $brand_Output = null;
        $selected_stores = [];

        //find the product
        $product = Product::find($request['id']);

        //Categories selection output with selected
        $selected_category = $product->sub_cat->id;
        $categories = SubCat::orderBy('name', 'asc')->get();
        foreach ($categories as $category)
        {
            if ($category['id'] == $selected_category)
            {
                $category_Output .= '<option value="' . $category['id'] . '" selected>' . $category['name'] . '</option>';
            } else
            {
                $category_Output .= '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
            }
        }
        //Brands selection output with selected
        $selected_brand = $product->brand->id;
        $brands = Brand::orderBy('name', 'asc')->get();
        foreach ($brands as $brand)
        {
            if ($brand['id'] == $selected_brand)
            {
                $brand_Output .= '<option value="' . $brand['id'] . '" selected>' . $brand['name'] . '</option>';
            } else
            {
                $brand_Output .= '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
            }
        }

        //get selected stores ids
        foreach ($product->stores as $store)
        {
            $selected_stores[] = $store->id;
        }

        //Building the stores output markup layout
        $stores = Store::orderBy('name', 'asc')->get();
        foreach ($stores as $store)
        {
            //Apply (selected) attr to the selected options
            if (in_array($store['id'], $selected_stores))
            {
                $stores_Output .= '<option value="' . $store['id'] . '" selected>' . $store['name'] . '</option>';
            } else
            {
                $stores_Output .= '<option value="' . $store['id'] . '">' . $store['name'] . '</option>';
            }
        }

        return response()->json([
            'info'  => $product, 'category' => $category_Output,
            'brand' => $brand_Output, 'stores' => $stores_Output,
        ]);
    }


    //Store or Update
    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required|string|min:5|max:200',
            'description'    => 'required',
            'price'          => 'required|numeric',
            'stock'          => 'required|numeric',
            'sales'          => 'nullable|numeric',
            'discount'       => 'nullable|numeric',
            'featured_image' => 'nullable|image|max:1999',
            'images'         => 'nullable',
            'category'       => 'required',
            'brand'          => 'required',
            'stores'         => 'required',
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
                if ($request->hasFile('featured_image'))
                {
                    $fileNameWithExt = $request->file('featured_image')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('featured_image')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    //Store The Image
                    $request->file('featured_image')->storeAs('public/products', $fileNameToStore);
                } else
                {
                    $fileNameToStore = 'product-default.png';
                }

                //Check if it has images
                $images = [];
                if ($request->hasFile('images'))
                {
                    $files = $request->file('images');
                    foreach ($files as $file)
                    {
                        $fileNameWithExt = $file->getClientOriginalName();
                        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                        $extension = $file->getClientOriginalExtension();
                        $fileNameToStore2 = $fileName . '_' . time() . '.' . $extension;
                        $images[] = $fileNameToStore2;
                        //Store The Image
                        $file->storeAs('public/products', $fileNameToStore2);
                    }
                } else
                {
                    $fileNameToStore2 = 'product-default.png';
                    $images[] = $fileNameToStore2;
                    $images[] = $fileNameToStore2;
                }

                //Check for Featured and Offer switches status
                if ($request['is_featured'] == 'on')
                {
                    $request['is_featured'] = 1;
                } else
                {
                    $request['is_featured'] = 0;
                }

                if ($request['has_offer'] == 'on')
                {
                    $request['has_offer'] = 1;
                    //Set the new Price
                    $newPrice = $request['price'] - (($request['discount'] * $request['price']) / 100);
                } else
                {
                    $request['has_offer'] = 0;
                    $request['discount'] = 0;
                    $newPrice = $request['price'];
                }

                //Create new product
                $product = Product::create([
                    'name'           => $request['name'],
                    'description'    => $request['description'],
                    'price'          => $request['price'],
                    'stock'          => $request['stock'],
                    'sales'          => $request['sales'],
                    'discount'       => $request['discount'],
                    'new_price'       => $newPrice,
                    'images'         => implode("|", $images),
                    'is_featured'    => $request['is_featured'],
                    'has_offer'      => $request['has_offer'],
                    'brand_id'       => $request['brand'],
                    'sub_cat_id'     => $request['category'],
                    'featured_image' => $fileNameToStore,
                    'slug'           => str_slug($request['name'])
                ]);

                $product->stores()->attach($request['stores']);
                $success_output = "<div class='alert alert-success'>Created new product successfully.</div>";

                //If the request is update Process Update Request
            } elseif ($request['form_action'] == 'update')
            {
                $product = Product::find($request['product_id']);
                //Check if it has an image file
                if ($request->hasFile('featured_image'))
                {
                    $fileNameWithExt = $request->file('featured_image')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('featured_image')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    //Store The Image
                    $request->file('featured_image')->storeAs('public/products', $fileNameToStore);
                    if ($product['featured_image'] != 'product-default.png')
                    {
                        \Storage::delete('/public/products/' . $product['featured_image']);
                    }
                } else
                {
                    //$fileNameToStore = 'product-default.png';
                    $fileNameToStore = $product['featured_image'];
                    //if ($product['featured_image'] != 'product-default.png')
                    //{
                    //\Storage::delete('/public/products/' . $product['featured_image']);
                    // }
                }

                //Check if it has images
                $images = [];
                if ($request->hasFile('images'))
                {
                    $files = $request->file('images');
                    foreach ($files as $file)
                    {
                        $fileNameWithExt = $file->getClientOriginalName();
                        $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                        $extension = $file->getClientOriginalExtension();
                        $fileNameToStore2 = $fileName . '_' . time() . '.' . $extension;
                        $images[] = $fileNameToStore2;
                        //Store The Image
                        $file->storeAs('public/products', $fileNameToStore2);
                        if ( ! in_array('product-default.png', $imagesArray = explode('|', $product['images'])))
                        {
                            foreach ($imagesArray as $item)
                            {
                                \Storage::delete('/public/products/' . $item);
                            }
                        }
                    }
                } else
                {
                    $images[] = $product['images'];

//                    if ( ! in_array('product-default.png', $imagesArray = explode('|', $product['images'])))
//                    {
//                        foreach ($imagesArray as $item)
//                        {
//                            \Storage::delete('/public/products/' . $item);
//                        }
//                    }
                }

                //Check for Featured and Offer switches status
                if ($request['is_featured'] == 'on')
                {
                    $request['is_featured'] = 1;
                } else
                {
                    $request['is_featured'] = 0;
                }

                if ($request['has_offer'] == 'on')
                {
                    $request['has_offer'] = 1;
                    //Set the new Price
                    $newPrice = $request['price'] - (($request['discount'] * $request['price']) / 100);
                } else
                {
                    $request['has_offer'] = 0;
                    $request['discount'] = 0;
                    $newPrice = $request['price'];
                }

                $product->update([
                    'name'           => $request['name'],
                    'description'    => $request['description'],
                    'price'          => $request['price'],
                    'stock'          => $request['stock'],
                    'sales'          => $request['sales'],
                    'discount'       => $request['discount'],
                    'new_price'       => $newPrice,
                    'images'         => implode("|", $images),
                    'is_featured'    => $request['is_featured'],
                    'has_offer'      => $request['has_offer'],
                    'brand_id'       => $request['brand'],
                    'sub_cat_id'     => $request['category'],
                    'featured_image' => $fileNameToStore,
                    'slug'           => str_slug($request['name'])
                ]);
                //Sync changes on the pivot relation table
                $product->stores()->sync($request['stores']);
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
        $storesOutput = null;
        $imagesOutput = null;
        $product = Product::find($request['id']);
        $featured_image = $product['featured_image'];
        //check for featured and offer status
        if ($product['is_featured'] == 1)
        {
            $product['is_featured'] = 'Yes';
        } else
        {
            $product['is_featured'] = 'No';
        }

        if ($product['has_offer'] == 1)
        {
            $product['has_offer'] = 'Yes';
        } else
        {
            $product['has_offer'] = 'No';
        }
        //fetch product's stores
        $stores = $product->stores;
        foreach ($stores as $store)
        {
            $storesOutput .= '<div style="margin: 5px;display: inline-block" class="label label-primary">' . $store['name'] . '</div>';
        }

        $images = explode('|', $product['images']);
        foreach ($images as $image)
        {
            $imagesOutput .= '<div class="col-md-4"><div class="thumbnail"><img style="width: 100%; display: block;" src="' . asset('/storage/products/') . '/' . $image . '"></div></div>';
        }
        $info = '
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Name:</strong>' . $product['name'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Price:</strong>' . $product['price'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Stock:</strong>' . $product['stock'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Sales:</strong>' . $product['sales'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Category:</strong><span class="label label-info">' . $product->sub_cat->name . '</span></li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Brand:</strong><span class="label label-success">' . $product->brand->name . '</span></li>
                  <li style="display: inline-block; height:auto" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Stores:</strong><div class="col-lg-8 col-md-8">' . $storesOutput . '</div></li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Is Featured?:</strong>' . $product['is_featured'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Has Offer?:</strong>' . $product['has_offer'] . '</li>
                  <li style="display: inline-block;height:auto" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Description:</strong><div class="col-lg-8 col-md-8" style="height:auto">' . $product['description'] . '</div></li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Slug: </strong>' . $product['slug'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Created at: </strong>' . $product['created_at'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Updated at: </strong>' . $product['updated_at'] . '</li>
        ';
        return response()->json(['info' => $info, 'featured_image' => $featured_image, 'images' => $imagesOutput]);
    }

    //Remove single data record
    public function removeData(Request $request)
    {
        $product = Product::find($request['id']);

        if ($product->delete())
        {
            $product->stores()->detach();
            if ($product['featured_image'] != 'product-default.png')
            {
                \Storage::delete('/public/products/' . $product['featured_image']);
            }

            if ( ! in_array('product-default.png', $imagesArray = explode('|', $product['images'])))
            {
                foreach ($imagesArray as $item)
                {
                    \Storage::delete('/public/products/' . $item);
                }
            }
            return response()->json('Successfully deleted.');
        }
    }

    //Remove bulk data records
    public function removeBulk(Request $request)
    {
        $products_id_array = $request['id'];
        foreach ($products_id_array as $product_id)
        {
            $product = Product::find($product_id);
            if ($product->delete())
            {
                $product->stores()->detach();
                if ($product['featured_image'] != 'product-default.png')
                {
                    \Storage::delete('/public/products/' . $product['featured_image']);
                }

                if ( ! in_array('product-default.png', $imagesArray = explode('|', $product['images'])))
                {
                    foreach ($imagesArray as $item)
                    {
                        \Storage::delete('/public/products/' . $item);
                    }
                }
            }
        }
        return response()->json('Data deleted successfully.');
    }

    //Fetch categories, sub categories,and brands to be used within the Create New Modal
    public function dataSelect()
    {
        //Get all categories
        $categories = SubCat::orderBy('name', 'asc')->get();
        $allCategories = '<option value="">Select Category..</option>';

        foreach ($categories as $category)
        {
            $allCategories .= '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
        }

        //Get all brands
        $brands = Brand::orderBy('name', 'asc')->get();
        $allBrands = '<option value="">Select Brand..</option>';

        foreach ($brands as $brand)
        {
            $allBrands .= '<option value="' . $brand['id'] . '">' . $brand['name'] . '</option>';
        }

        //Get all stores
        $stores = Store::orderBy('name', 'asc')->get();
        $allStores = null;

        foreach ($stores as $store)
        {
            $allStores .= '<option value="' . $store['id'] . '">' . $store['name'] . '</option>';
        }

        return response()->json(['allCategories' => $allCategories, 'allBrands' => $allBrands, 'allStores' => $allStores]);
    }
}
