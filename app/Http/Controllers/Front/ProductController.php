<?php

namespace App\Http\Controllers\Front;

use App\Category;
use App\Mail\CommentWaiting;
use App\Product;
use App\Setting;
use Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Review;

class ProductController extends Controller
{
    public function index(Request $request, Product $product)
    {
        //get the latest 10 products
        $latest_products = Product::orderBy('created_at', 'desc')->take(10)->get();
        //Website settings
        $settings = Setting::first();
        //Get all categories for main menu
        $categories = Category::orderBy('name', 'asc')->get();
        //product images
        $images = explode('|', $product['images']);

        //Prepare Up sell products (Second image - Discounts)
        $upSellProducts_output = [];
        $upSellProducts = Product::where('sub_cat_id', $product->sub_cat->id)->where('id', '<>', $product->id)->get();
        $upSellProducts_output = Helper::prepare_products($upSellProducts, $upSellProducts_output);

        //Most Recent Products Widget
        $mostRecentProducts = Product::orderBy('created_at', 'desc')->take(3)->get();

        //Featured Products Widget
        $featuredProducts = Product::where('is_featured', 1)->orderBy('created_at', 'desc')->take(3)->get();

        //Best Sellers Widget
        $BestSellingProducts = Product::where('sales', '>', 50)->orderBy('created_at', 'desc')->take(3)->get();

        //Product Reviews
        $productReviews = $product->reviews()->where('status',1)->orderBy('updated_at','desc')->get();

        return view('shop.product')->with([
            'settings'            => $settings,
            'latest'              => $latest_products,
            'product'             => $product,
            'categories'          => $categories,
            'images'              => $images,
            'upSellProducts'      => $upSellProducts_output,
            'mostRecentProducts'  => $mostRecentProducts,
            'featuredProducts'    => $featuredProducts,
            'BestSellingProducts' => $BestSellingProducts,
            'productReviews' => $productReviews,
        ]);
    }

    //Front end review submitting
    public function reviewSubmit(Request $request)
    {
        $rules = [
            'comment' => 'required|min:5|max:1000',
        ];
        $validation = Validator::make($request->all(), $rules);
        $errors_output = '';
        $success_output = '';
        if ($validation->fails())
        {
            foreach ($validation->messages()->getMessages() as $field_name => $messages)
            {
                $errors_output .= $messages[0];
                $success_output .= false;
            }
        } else
        {
            $review = Review::create([
                'comment' => $request['comment'],
                'user_id' => $request->user()->id,
                'product_id' => $request['id'],
                'status' => 0
            ]);
            //Send mail to the user to notify him
            \Mail::to($request->user()->email)->send(new CommentWaiting($review->id));

            $errors_output .= false;
            $success_output .= 'success';
        }

        return response()->json(['success'=>$success_output , 'error'=>$errors_output]);
    }
}
