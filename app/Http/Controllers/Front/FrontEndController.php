<?php

namespace App\Http\Controllers\Front;

use App\Brand;
use App\Category;
use App\Message;
use App\Product;
use App\Setting;
use App\Slider;
use App\Store;
use App\SubCat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Helper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cookie;
use Newsletter;

class FrontEndController extends Controller
{
    //Home Page
    public function index()
    {
        //Prepare Featured products (Second image - Discounts)
        $featured_products_output = [];
        $featured_products = Product::where('is_featured', 1)->orderBy('name', 'asc')->get();
        $featured_products_output = Helper::prepare_products($featured_products, $featured_products_output);

        //Prepare Latest products (Second image - Discounts)
        $latest_products_output = [];
        $latest_products = Product::orderBy('created_at', 'desc')->take(10)->get();
        $latest_products_output = Helper::prepare_products($latest_products, $latest_products_output);

        //Prepare Best Selling products (Second image - Discounts)
        $best_products_output = [];
        $best_products = Product::where('sales', '>', 50)->orderBy('name', 'asc')->take(10)->get();
        $best_products_output = Helper::prepare_products($best_products, $best_products_output);

        $settings = Setting::first();
        $slides = Slider::all();
        $categories = Category::orderBy('name', 'asc')->get();
        $sub_cats = SubCat::orderBy('name', 'asc')->take(5)->get();
        $brands = Brand::orderBy('name', 'asc')->get();
        $collections = Category::orderBy('created_at', 'desc')->take(5)->get();
        return view('pages.index')->with([
            'settings'          => $settings,
            'slides'            => $slides,
            'categories'        => $categories,
            'brands'            => $brands,
            'collections'       => $collections,
            'sub_cats'          => $sub_cats,
            'featured_products' => $featured_products_output,
            'latest'            => $latest_products,
            'latest_products'   => $latest_products_output,
            'best_products'     => $best_products_output,
        ]);
    }

    //All Brands Page
    public function AllBrands()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();
        $brands = Brand::all();
        return view('pages.allBrands')->with([
            'settings'   => $settings,
            'categories' => $categories,
            'brands'     => $brands,
        ]);
    }

    //Single Brand Page
    public function singleBrand(Brand $brand)
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('pages.singleBrand')->with([
            'settings'   => $settings,
            'categories' => $categories,
            'brand'      => $brand,
        ]);
    }

    //All Stores Page
    public function AllStores()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();
        $stores = Store::all();
        return view('pages.allStores')->with([
            'settings'   => $settings,
            'categories' => $categories,
            'stores'     => $stores,
        ]);
    }

    //Single Store Page
    public function singleStore(Store $store)
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();

        return view('pages.singleStore')->with([
            'settings'   => $settings,
            'categories' => $categories,
            'store'      => $store,
        ]);
    }

    //Contact Us Page
    public function contactUs()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.contactUs')->with([
            'settings'   => $settings,
            'categories' => $categories,
        ]);
    }

    //Send Message
    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name'    => 'required|string|min:5|max:50',
            'email'   => 'required|email',
            'subject' => 'required|string|min:5|max:100',
            'body'    => 'required'
        ]);

        Message::create([
            'name'    => $request['name'],
            'email'   => $request['email'],
            'subject' => $request['subject'],
            'body'    => $request['body'],
        ]);

        return redirect()->back()->with('success', 'Message sent successfully.');
    }

    //About Us Page
    public function aboutUs()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.aboutUs')->with([
            'settings'   => $settings,
            'categories' => $categories,
        ]);
    }

    //Terms And Conditions Page
    public function terms()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.terms')->with([
            'settings'   => $settings,
            'categories' => $categories,
        ]);
    }

    //Privacy Policy Page
    public function privacy()
    {
        $settings = Setting::first();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('pages.privacy')->with([
            'settings'   => $settings,
            'categories' => $categories,
        ]);
    }

    //Newsletter subscription
    public function newsletter(Request $request)
    {
        $this->validate($request,[
            'email' => 'required|email'
        ]);

        if (Newsletter::subscribe($request->email)){
            return redirect()->back()->with('success','You have subscribed successfully.');
        }else{
            return redirect()->back()->with('error','Subscription failed.');
        }
    }
}
