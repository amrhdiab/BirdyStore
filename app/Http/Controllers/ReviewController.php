<?php

namespace App\Http\Controllers;

use App\Mail\CommentApproved;
use App\Review;
use App\Order;
use App\Message;
use Illuminate\Http\Request;
use App\Setting;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
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
        return view('admin.reviews.index')->with([
            'settings' => $settings,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }

    //Fetch Initial reviews data to display via DataTables
    public function fetchData()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();

        return Datatables::of($reviews)->addColumn('actions', function ($review)
        {
            return '<button class="btn btn-xs btn-default view" id="' . $review->id . '"><i class="glyphicon glyphicon-eye-open"></i> View</button>
            <button class="btn btn-xs btn-primary edit" data-status="' . $review->status . '" id="' . $review->id . '"><i class="glyphicon glyphicon-edit"></i> Change Status</button>
            <button class="btn btn-xs btn-danger delete" id="' . $review->id . '"><i class="glyphicon glyphicon-trash"></i> Delete</button>';
        })
            ->addColumn('checkboxes', '<input type="checkbox" name="review_checkbox[]" class="review_checkbox"  value="{{$id}}" />')
            ->addColumn('user_name', function ($review)
            {
                return $review->user->name;
            })
            ->addColumn('product', function ($review)
            {
                return $review->product->name;
            })
            ->addColumn('status', function ($review)
            {
                if ($review->status == 1)
                {
                    return '<span id="' . $review->id . '" class="label label-success">Published</span>';
                } else
                {
                    return '<span id="' . $review->id . '" class="label label-warning">Waiting</span>';
                }

            })
            ->rawColumns(['actions', 'checkboxes', 'status'])->make(true);
    }


    //Update
    public function store(Request $request)
    {
        $review = Review::find($request['id']);
        if ($request['current_status'] == 1)
        {
            $review->update([
                'status' => 0,
            ]);
            $newStatus = 0;
        } else
        {
            $review->update([
                'status' => 1,
            ]);
            $newStatus = 1;
            //Send mail to the user to notify him
            \Mail::to($review->user->email)->send(new CommentApproved($review->id));
        }
        return response()->json(['status' => $newStatus]);
    }

    //Fetch data for view
    public function view(Request $request)
    {
        $review = Review::find($request['id']);
        if ($review['status'] == 1)
        {
            $label = '<span class="label label-success">Published</span>';
        } else
        {
            $label = '<span class="label label-warning">Waiting</span>';
        }
        $info = '
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">User Name:</strong>' . $review->user->name . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Reviewed Product:</strong>' . $review->product->name . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Comment Status:</strong>' . $label . '</li>
                  <li style="display: inline-block;height:auto" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Description:</strong><div class="col-lg-8 col-md-8" style="height:auto">' . $review['comment'] . '</div></li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Created at: </strong>' . $review['created_at'] . '</li>
                  <li style="padding-bottom: 5%" class="list-group-item form-control"><strong class="col-lg-4 col-md-4">Updated at: </strong>' . $review['updated_at'] . '</li>
        ';

        return response()->json(['info' => $info]);
    }

    //Remove single data record
    public function removeData(Request $request)
    {
        $review = Review::find($request['id']);

        if ($review->delete())
        {
            return response()->json('Successfully deleted.');
        }
    }

    //Remove bulk data records
    public function removeBulk(Request $request)
    {
        $reviews_id_array = $request['id'];
        foreach ($reviews_id_array as $review_id)
        {
            $review = Review::find($review_id);
            $review->delete();
        }
        return response()->json('Data deleted successfully.');
    }
}
