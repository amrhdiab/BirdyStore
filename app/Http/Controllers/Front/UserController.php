<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Mail\PurchaseSuccessful;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Setting;
use App\User;
use Cart;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next)
        {
            Cart::restore($request->user()->id);

            return $next($request);
        });
    }

    /**
     * Show the user dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $settings = Setting::first();

        $user = User::find(Auth::guard()->user()->id);
        $userOrders = $user->orders;
        $userReviews = $user->reviews()->orderBy('created_at','desc')->take(4)->get();
        return view('userDashboard.userAccount')->with([
            'settings'   => $settings,
            'categories' => $categories,
            'userOrders' => $userOrders,
            'userReviews' => $userReviews,
            'key'        => 1,
        ]);
    }

    //Update username and avatar
    public function update(Request $request)
    {
        $rules = [
            'name'   => 'required|string|min:5|max:50',
            'avatar' => 'nullable|image|max:1999'
        ];
        $validation = Validator::make($request->all(), $rules);
        $errors_output = [];
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $errors_output[] = $messages[0];
            }
        } else
        {
            $user = User::find($request['user_id']);
            if ($request->hasFile('avatar'))
            {
                $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
                $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('avatar')->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
                //Store The Image
                $request->file('avatar')->storeAs('public/users', $fileNameToStore);
            } else
            {
                $fileNameToStore = $user['avatar'];
            }

            $user->update([
                'name'   => $request['name'],
                'avatar' => $fileNameToStore,
            ]);
        }
        return response()->json([
            'error'  => $errors_output,
            'name'   => $user['name'],
            'avatar' => $user['avatar'],
        ]);
    }

    //All user orders
    public function orders()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $settings = Setting::first();

        $user = User::find(Auth::guard()->user()->id);
        $userOrders = $user->orders()->orderBy('created_at','desc')->get();

        return view('userDashboard.userOrders')->with([
            'settings'   => $settings,
            'categories' => $categories,
            'userOrders' => $userOrders,
            'key'        => 1,
        ]);
    }
    //All user made reviews
    public function reviews()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $settings = Setting::first();

        $user = User::find(Auth::guard()->user()->id);
        $userReviews = $user->reviews()->orderBy('created_at','desc')->get();

        return view('userDashboard.userReviews')->with([
            'settings'   => $settings,
            'categories' => $categories,
            'userReviews' => $userReviews,
            'key'        => 1,
        ]);
    }

    public function singleOrder(Order $order)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $settings = Setting::first();

        return view('userDashboard.singleOrder')->with([
            'settings'   => $settings,
            'categories' => $categories,
            'order' => $order,
            'key'        => 1,
        ]);
    }
}
