<?php

namespace App\Http\Controllers;
use App\Setting;
use App\Message;
use Illuminate\Support\Facades\Validator;
use App\Category;
use App\Review;
use App\Order;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
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
        return view('admin.categories.index')->with([
            'settings' => $settings,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }

    public function fetchData()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        foreach ($categories as $category)
        {
            $category['featured_image'] = '<img src="' . asset('/storage/categories/' . $category['featured_image']) . '"style="max-height: 60px; max-width: 70px;">';
        }
        return Datatables::of($categories)->addColumn('actions', function ($category)
        {
            return '<button class="btn btn-xs btn-default view" id="' . $category->id . '"><i class="glyphicon glyphicon-eye-open"></i> View</button>
            <button class="btn btn-xs btn-primary edit" id="' . $category->id . '"><i class="glyphicon glyphicon-edit"></i> Edit</button>
            <button class="btn btn-xs btn-danger delete" id="' . $category->id . '"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
            ->addColumn('checkboxes', '<input type="checkbox" name="cat_checkbox[]" class="cat_checkbox"  value="{{$id}}" />')
            ->rawColumns(['featured_image', 'actions', 'checkboxes'])->make(true);
    }

    public function fetch_single(Request $request)
    {
        $category = Category::find($request['id']);
        return response()->json($category);
    }


    public function store(Request $request)
    {
        $rules = [
            'name'           => 'required|string|min:5|max:200',
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
                    $request->file('featured_image')->storeAs('public/categories', $fileNameToStore);
                } else
                {
                    $fileNameToStore = 'category-default.png';
                }
                Category::create([
                    'name'           => $request['name'],
                    'featured_image' => $fileNameToStore,
                    'slug'           => str_slug($request['name'])
                ]);
                $success_output = "<div class='alert alert-success'>Created new category successfully.</div>";
            } elseif ($request['form_action'] == 'update')
            {
                $category = Category::find($request['cat_id']);
                if ($request->hasFile('featured_image'))
                {
                    $fileNameWithExt = $request->file('featured_image')->getClientOriginalName();
                    $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                    $extension = $request->file('featured_image')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                    //Store The Image
                    $request->file('featured_image')->storeAs('public/categories', $fileNameToStore);
                    if ($category['featured_image'] != 'category-default.png')
                    {
                        \Storage::delete('/public/categories/' . $category['featured_image']);
                    }
                } else
                {
                    $fileNameToStore = 'category-default.png';
                    if ($category['featured_image'] != 'category-default.png')
                    {
                        \Storage::delete('/public/categories/' . $category['featured_image']);
                    }
                }

                $category->update([
                    'name'           => $request['name'],
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
        $category = Category::find($request['id']);
        $featured_image = $category['featured_image'];
        $info = '
                  <li class="list-group-item form-control"><strong class="col-md-4">Name:</strong>'.$category['name'].'</li>
                  <li class="list-group-item form-control"><strong class="col-md-4">Slug: </strong>'.$category['slug'].'</li>
                  <li class="list-group-item form-control"><strong class="col-md-4">Created at: </strong>'.$category['created_at'].'</li>
                  <li class="list-group-item form-control"><strong class="col-md-4">Updated at: </strong>'.$category['updated_at'].'</li>
        ';
        return response()->json(['info'=>$info,'featured_image'=>$featured_image]);
    }


    public function removeData(Request $request)
    {
        $category = Category::find($request['id']);

        if ($category->delete())
        {
            if ($category['featured_image'] != 'category-default.png')
            {
                \Storage::delete('/public/categories/' . $category['featured_image']);
            }
            return response()->json('Successfully deleted.');
        }
    }

    public function removeBulk(Request $request)
    {
        $cat_id_array = $request['id'];
        foreach ($cat_id_array as $cat_id)
        {
            $category = Category::find($cat_id);
            if ($category->delete())
            {
                if ($category['featured_image'] != 'category-default.png')
                {
                    \Storage::delete('/public/categories/' . $category['featured_image']);
                }
            }
        }
        return response()->json('Data deleted successfully.');
    }
}
