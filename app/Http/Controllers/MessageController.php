<?php

namespace App\Http\Controllers;

use App\Message;
use App\Setting;
use App\Review;
use App\Order;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //Get all messages
    public function index()
    {
        //get unread user messages for the navbar
        $messages = Message::where('is_read',0)->take(4)->orderBy('created_at','desc')->get();
        //get all unread messages count for the navbar
        $messagesCount = Message::where('is_read',0)->count();
        //get the count of orders with waiting status for sidebar menu
        $waitingOrders = Order::where('status','Waiting')->count();
        //get the count of reviews with waiting status for sidebar menu
        $waitingReviews = Review::where('status','Waiting')->count();
        $allMessages = Message::orderBy('created_at', 'desc')->paginate(10);
        $settings = Setting::first();
        return view('admin.messages.index')->with([
            'settings' => $settings,
            'allMessages' => $allMessages,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }

    //Get Single Message
    public function message(Message $message)
    {
        //get unread user messages for the navbar
        $messages = Message::where('is_read',0)->take(4)->orderBy('created_at','desc')->get();
        //get all unread messages count for the navbar
        $messagesCount = Message::where('is_read',0)->count();
        //get the count of orders with waiting status for sidebar menu
        $waitingOrders = Order::where('status','Waiting')->count();
        //get the count of reviews with waiting status for sidebar menu
        $waitingReviews = Review::where('status','Waiting')->count();
        $settings = Setting::first();
        //update the initial message status to read
        $message->update(['is_read'=>1]);
        return view('admin.messages.single')->with([
            'settings' => $settings,
            'message' => $message,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }

    //Delete message
    public function delete(Message $message)
    {
        $message->delete();
        return redirect()->route('messages.index')->with('success','Message deleted successfully.');
    }
}
