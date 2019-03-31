<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Mail\PurchaseSuccessful;
use App\Order;
use App\Setting;
use App\Product;
use App\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Stripe\Charge;
use Stripe\Stripe;

class ShoppingCartController extends Controller
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

    public function __destruct()
    {
        Cart::store(Auth::guard()->user()->id);
    }

    public function index()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();

        //Most Recent Products Widget
        $mostRecentProducts = Product::orderBy('created_at', 'desc')->take(3)->get();

        //Best Sellers Widget
        $BestSellingProducts = Product::where('sales', '>', 50)->orderBy('created_at', 'desc')->take(3)->get();
        return view('shop.shoppingCart')->with([
            'settings'            => $settings,
            'categories'          => $categories,
            'mostRecentProducts'  => $mostRecentProducts,
            'BestSellingProducts' => $BestSellingProducts,
        ]);
    }

    public function add(Request $request)
    {
        //Existence flag
        $exist = '';
        $res = [];
        //get the product
        $product = Product::find($request->id);

        //Check if an item is in cart already
        foreach (Cart::content() as $item)
        {
            if ($item->id == $request->id)
            {
                $exist = 1;
                break;
            } else
            {
                $exist = 0;
            }
        }
        //Check for quantity
        if ($request['qty'] > 0)
        {
            if ($product['stock'] < $request['qty'])
            {
                return response()->json(['success' => false, 'error' => 'Product quantity can\'t exceed the available stock.']);
            } else
            {
                //Add product to cart
                $cartItem = Cart::add([
                    'id'    => $request['id'],
                    'name'  => $product['name'],
                    'qty'   => $request['qty'],
                    'price' => $product['new_price']]);
                //Create an association with the Product model
                $cartItem->associate('App\Product');

                return response()->json(['success' => true, 'error' => '', 'exist' => $exist]);
            }
        } else
        {
            return response()->json(['success' => false, 'error' => 'Product quantity has to be equal or greater than 1']);
        }
    }

    public function remove(Request $request)
    {
        Cart::remove($request->id);
        return response()->json('success');
    }

    public function update(Request $request)
    {
        $products = $request['items'];
        foreach ($products as $product)
        {
            Cart::update($product[1], $product[0]);
        }
        return response()->json('Cart items updated.');
    }

    public function checkout()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();

        //Most Recent Products Widget
        $mostRecentProducts = Product::orderBy('created_at', 'desc')->take(3)->get();

        //Best Sellers Widget
        $BestSellingProducts = Product::where('sales', '>', 50)->orderBy('created_at', 'desc')->take(3)->get();
        return view('shop.checkout')->with([
            'settings'            => $settings,
            'categories'          => $categories,
            'mostRecentProducts'  => $mostRecentProducts,
            'BestSellingProducts' => $BestSellingProducts,
        ]);
    }

    public function pay(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|min:5|max:50',
            'last_name'  => 'required|string|min:5|max:50',
            'email'      => 'required|email',
            'address'    => 'required',
            'phone'      => 'required|numeric',
            'city'       => 'required',
            'country'    => 'required',
            'postal'     => 'required|numeric',
        ]);

        Stripe::setApiKey('sk_test_0tPEcEUzt9mxiT7urm3akfVu');

        //Charge the user
        $charge = Charge::create([
            'amount'   => Cart::total(0, '', '') * 100,
            'currency' => 'usd',
            'source'   => $request->stripeToken
        ]);

        //Save the user order in database
        $order = Order::create([
            'first_name'  => $request['first_name'],
            'last_name'   => $request['last_name'],
            'email'       => $request['email'],
            'address'     => $request['address'],
            'phone'       => $request['phone'],
            'city'        => $request['city'],
            'country'     => $request['country'],
            'postal'      => $request['postal'],
            'notes'       => $request['notes'],
            'total_price' => Cart::total(0, '', ''),
            'user_id'     => $request->user()->id,
            'status'      => 'Waiting',
        ]);

        //subtract purchased quantities from products stock
        $products = [];
        foreach (Cart::content() as $item)
        {
            $product = Product::find($item->id);
            //attach product to the order
            $order->products()->attach($product['id'], ['quantity' => $item->qty]);
            //Update product stock and sales
            $oldStock = $product['stock'];
            $oldSales = $product['sales'];
            $product->update([
                'stock' => $oldStock - $item->qty,
                'sales' => $oldSales + $item->qty,
            ]);
        }
        //Destroy Cart
        Cart::destroy();

        //send mail to the user
        \Mail::to(Auth::guard()->user()->email)->send(new PurchaseSuccessful($order->id));
        return redirect()->route('user.orders')->with('success', 'Your payment was successful. A mail was sent to your e-mail address.');

    }
}
