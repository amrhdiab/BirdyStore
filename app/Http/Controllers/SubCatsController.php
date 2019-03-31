<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Message;
use Illuminate\Support\Facades\Validator;
use App\SubCat;
use App\Category;
use App\Review;
use App\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SubCatsController extends Controller
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
        return view('admin.subcats.index')->with([
            'settings' => $settings,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }

    public function fetchData()
    {
        $subcategories = SubCat::orderBy('created_at', 'desc')->get();
        foreach ($subcategories as $subcategory)
        {
            $subcategory['featured_image'] = '<img src="' . asset('/storage/subcategories/' . $subcategory['featured_image']) . '"style="max-height: 60px; max-width: 70px;">';
        }
        return Datatables::of($subcategories)->addColumn('actions', function ($subcategory)
        {
            return '<button class="btn btn-xs btn-default view" id="' . $subcategory->id . '"><i class="glyphicon glyphicon-eye-open"></i> View</button>
            <button class="btn btn-xs btn-primary edit" id="' . $subcategory->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</button>
            <button class="btn btn-xs btn-danger delete" id="' . $subcategory->id . '"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
            ->addColumn('checkboxes', '<input type="checkbox" name="subcategory_checkbox[]" class="subcategory_checkbox"  value="{{$id}}" />')
            ->addColumn('parent_category',function ($subcategory){
               return $subcategory->category->name;
            })
            ->rawColumns(['featured_image', 'actions', 'checkboxes'])->make(true);
    }

    public function fetch_single(Request $request)
    {
        $subcategory = SubCat::find($request['id']);
        $selected_category = Category::find($subcategory['category_id']);
        $categories = Category::orderBy('name', 'asc')->get();

        $output = '<option value="">Select main category..</option>';
        foreach ($categories as $category)
        {
            if ($category['id'] == $selected_category['id'])
            {
                $status = 'selected';
            } else
            {
                $status = '';
            }
            $output .= '<option value="' . $category['id'] . '" ' . $status . '>' . $category['name'] . '</option>';
        }
        return response()->json(['info' => $subcategory, 'main_category' => $output]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required|string|min:5|max:200',
            'category_id'    => 'required',
            'featured_image' => 'nullable|image|max:1999'
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
            if ($request['form_action'] == 'insert')
            {
                if ($request->hasFile('featured_image'))
                {
                    $fileNameWithExt = $request->file('featured_image')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('featured_image')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    //Store The Image
                    $request->file('featured_image')->storeAs('public/subcategories', $fileNameToStore);
                } else
                {
                    $fileNameToStore = 'subcategory-default.png';
                }
                SubCat::create([
                    'name'           => $request['name'],
                    'category_id'    => $request['category_id'],
                    'featured_image' => $fileNameToStore,
                    'slug'           => str_slug($request['name'])
                ]);
                $success_output = "<div class='alert alert-success'>Created new subcategory successfully.</div>";
            } elseif ($request['form_action'] == 'update')
            {
                $subcategory = SubCat::find($request['subcat_id']);
                if ($request->hasFile('featured_image'))
                {
                    $fileNameWithExt = $request->file('featured_image')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('featured_image')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    //Store The Image
                    $request->file('featured_image')->storeAs('public/subcategories', $fileNameToStore);
                    if ($subcategory['featured_image'] != 'subcategory-default.png')
                    {
                        \Storage::delete('/public/subcategories/' . $subcategory['featured_image']);
                    }
                } else
                {
                    $fileNameToStore = 'subcategory-default.png';
                    if ($subcategory['featured_image'] != 'subcategory-default.png')
                    {
                        \Storage::delete('/public/subcategories/' . $subcategory['featured_image']);
                    }
                }

                $subcategory->update([
                    'name'           => $request['name'],
                    'category_id'    => $request['category_id'],
                    'featured_image' => $fileNameToStore,
                    'slug'           => str_slug($request['name'])
                ]);
            }
        }

        $output = [
            'error'   => $errors_output,
            'success' => $success_output,
        ];

        return response()->json($output);
    }

    public function view(Request $request)
    {
        $subcategory = SubCat::find($request['id']);
        $featured_image = $subcategory['featured_image'];
        $parent_Category = $subcategory->category->name;
        $info = '
                  <li class="list-group-item form-control"><strong class="col-md-4">Name:</strong>' . $subcategory['name'] . '</li>
                  <li class="list-group-item form-control"><strong class="col-md-4">Parent Category:</strong>' . $parent_Category . '</li>
                  <li class="list-group-item form-control"><strong class="col-md-4">Slug: </strong>' . $subcategory['slug'] . '</li>
                  <li class="list-group-item form-control"><strong class="col-md-4">Created at: </strong>' . $subcategory['created_at'] . '</li>
                  <li class="list-group-item form-control"><strong class="col-md-4">Updated at: </strong>' . $subcategory['updated_at'] . '</li>
        ';
        return response()->json(['info' => $info, 'featured_image' => $featured_image]);
    }

    public function removeData(Request $request)
    {
        $subcategory = SubCat::find($request['id']);

        if ($subcategory->delete())
        {
            if ($subcategory['featured_image'] != 'subcategory-default.png')
            {
                \Storage::delete('/public/subcategories/' . $subcategory['featured_image']);
            }
            return response()->json('Successfully deleted.');
        }
    }

    public function removeBulk(Request $request)
    {
        $subcat_id_array = $request['id'];
        foreach ($subcat_id_array as $subcat_id)
        {
            $subcategory = SubCat::find($subcat_id);
            if ($subcategory->delete())
            {
                if ($subcategory['featured_image'] != 'subcategory-default.png')
                {
                    \Storage::delete('/public/subcategories/' . $subcategory['featured_image']);
                }
            }
        }
        return response()->json('Data deleted successfully.');
    }

    public function getAllCategories()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $output = '<option value="">Select main category..</option>';
        foreach ($categories as $category)
        {
            $output .= '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
        }
        return response()->json($output);
    }
}
