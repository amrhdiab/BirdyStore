<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Product
 *
 * @property int                                                        $id
 * @property string                                                     $name
 * @property string                                                     $description
 * @property int                                                        $price
 * @property string                                                     $featured_image
 * @property string                                                     $images
 * @property int                                                        $is_featured
 * @property int                                                        $has_offer
 * @property int                                                        $stock
 * @property int|null                                                   $sales
 * @property int                                                        $user_id
 * @property int                                                        $sub_cat_id
 * @property int                                                        $brand_id
 * @property string                                                     $slug
 * @property \Illuminate\Support\Carbon|null                            $created_at
 * @property \Illuminate\Support\Carbon|null                            $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereHasOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereIsFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereStock($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereSubCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Brand                                            $brand
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Store[] $stores
 * @property-read \App\SubCat                                           $sub_cat
 * @property-read \App\User                                             $user
 * @property int|null $discount
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereDiscount($value)
 * @property int|null $new_price
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereNewPrice($value)
 * @property int $admin_id
 * @property-read \App\Admin $admin
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Product whereAdminId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Order[] $orders
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Review[] $reviews
 */
class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'featured_image', 'images', 'is_featured',
        'has_offer', 'stock', 'sales', 'user_id', 'sub_cat_id', 'brand_id', 'slug',
        'discount','new_price',
    ];

    //Sub categories relation
    public function sub_cat()
    {
        return $this->belongsTo('App\SubCat');
    }

    //Brands relation
    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    //Admins relation
    public function admin()
    {
        return $this->belongsTo('App\Admin');
    }

    //Stores relation
    public function stores()
    {
        return $this->belongsToMany('App\Store')->withTimestamps();
    }

    //Orders relation
    public function orders(){
        return $this->belongsToMany('App\Order')->withPivot('quantity')->withTimestamps();
    }

    //Reviews relationship
    public function reviews(){
        return $this->hasMany('App\Review');
    }

    //Changing the route key name to use (Slugs) instead of (Ids)
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
