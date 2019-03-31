<?php

namespace App\Helpers;

use Illuminate\Pagination\LengthAwarePaginator;
use PhpParser\Node\Stmt\Class_;
use Illuminate\Support\Facades\Input;

class CustomHelper
{
    public static function cust_pagination($dataArray, $path, $query)
    {
        //Products pagination
        $page = Input::get('page', 1); // Get the ?page=1 from the url
        $perPage = 9; // Number of items per page
        $offset = ($page * $perPage) - $perPage;
        return new LengthAwarePaginator(
            array_slice($dataArray, $offset, $perPage, true), // Only grab the items we need
            count($dataArray), // Total items
            $perPage, // Items per page
            $page, // Current page
            ['path' => $path, 'query' => $query] // We need this so we can keep all old query parameters from the url
        );
    }

    public static function prepare_products($products, $output)
    {
        foreach ($products as $product)
        {
            if ($product['has_offer'] == 1)
            {
                $newPrice = $product['new_price'];
            } else
            {
                $newPrice = null;
            }
            $images = explode('|', $product['images']);
            $output[] = ['info' => $product, 'secondImage' => $images[1], 'newPrice' => $newPrice];
        }
        return $output;
    }

}