<?php

namespace App\Http\Controllers\Auth;

use App\Message;
use App\Order;
use App\Product;
use App\Review;
use App\Setting;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * show dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::first();
        //get unread user messages for the navbar
        $messages = Message::where('is_read',0)->take(4)->orderBy('created_at','desc')->get();
        //get all unread messages count for the navbar
        $messagesCount = Message::where('is_read',0)->count();
        $users = User::orderBy('created_at', 'desc')->get();
        //best selling products
        $products = Product::orderBy('sales','desc')->take(5)->get();
        //low stock products
        $lowStock_Products = Product::where('stock','<',20)->orderBy('stock','asc')->take(5)->get();
        //get total users count
        $usersCount = User::count();
        //get total reviews count on all products
        $reviewsCount = Review::count();
        //get total number of products
        $productsCount = Product::count();
        //get total number of orders
        $ordersCount = Order::count();
        //get the count of orders with waiting status for sidebar menu
        $waitingOrders = Order::where('status','Waiting')->count();
        //get the count of reviews with waiting status for sidebar menu
        $waitingReviews = Review::where('status','Waiting')->count();
        return view('admin.dashboard')->with([
            'settings' => $settings,
            'users' => $users,
            'products' => $products,
            'lowStock_Products' => $lowStock_Products,
            'usersCount' => $usersCount,
            'reviewsCount' => $reviewsCount,
            'productsCount' => $productsCount,
            'ordersCount' => $ordersCount,
            'messages' => $messages,
            'messagesCount' => $messagesCount,
            'waitingOrders' => $waitingOrders,
            'waitingReviews' => $waitingReviews,
        ]);
    }
}
