<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;
use App\Setting;
use Helper;
use App\SubCat;

class ShopSubCatController extends Controller
{
    public function index(Request $request, Category $category, SubCat $subCat)
    {
        //get the latest 10 products
        $latest_products = Product::orderBy('created_at', 'desc')->take(10)->get();
        //Website settings
        $settings = Setting::first();
        //Get all categories for sidebar
        $categories = Category::orderBy('name', 'asc')->get();

        //Get max and min product prices
        $max_price = $subCat->products()->max('new_price');
        $min_price = $subCat->products()->min('new_price');

        //Prepare All products (Second image - Discounts)
        $products_output = [];
        $products = $subCat->products()->orderBy('created_at', 'desc')->get();
        $products_output = Helper::prepare_products($products, $products_output);
        //Products pagination
        $paginateResult = Helper::cust_pagination($products_output, $request->url(), $request->query());

        return view('shop.subcat')->with([
            'settings'          => $settings,
            'categories'        => $categories,
            'latest'            => $latest_products,
            'products'          => $paginateResult,
            'count'             => count($products_output),
            'max_price'         => $max_price,
            'min_price'         => $min_price,
            'selected_category' => $category,
            'selected_subcat'   => $subCat,
        ]);
    }

    public function fetchData(Request $request, Category $category, SubCat $subCat)
    {
        if ($request->ajax())
        {
            //get the latest 10 products
            $latest_products = Product::orderBy('created_at', 'desc')->take(10)->get();
            //Website settings
            $settings = Setting::first();
            //Get all categories for sidebar
            $categories = Category::orderBy('name', 'asc')->get();
            //Get max and min product prices
            $max_price = $subCat->products()->max('new_price');
            $min_price = $subCat->products()->min('new_price');

            //Get Min and Max prices set
            $prices = explode(' - ', $request->get('price_filter'));
            $price_min = ltrim($prices[0], '$');
            $price_max = ltrim($prices[1], '$');

            $sort_by = $request->get('sortby');
            $sort_type = $request->get('sorttype');

            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
            $products_output = [];
            if ($query != null)
            {
                $products = $subCat->products()->where('products.name', 'like', '%' . $query . '%')
                    ->whereBetween('new_price', [$price_min, $price_max])
                    ->orderBy($sort_by, $sort_type)->get();
            } else
            {
                $products = $subCat->products()->whereBetween('new_price', [$price_min, $price_max])
                    ->orderBy($sort_by, $sort_type)->get();
            }

            $products_output = Helper::prepare_products($products, $products_output);
            //Products pagination
            $paginateResult = Helper::cust_pagination($products_output, $request->url(), $request->query());

            return view('shorts.productMarkup', [
                'settings'          => $settings,
                'categories'        => $categories,
                'latest'            => $latest_products,
                'products'          => $paginateResult,
                'count'             => count($products_output),
                'max_price'         => $max_price,
                'min_price'         => $min_price,
                'selected_category' => $category,
                'selected_subcat'   => $subCat,
            ])->render();
        }
    }
}
