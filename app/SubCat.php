<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SubCat
 *
 * @property int $id
 * @property string $name
 * @property string $featured_image
 * @property int $category_id
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubCat whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Brand[] $brands
 * @property-read \App\Category $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Store[] $stores
 */
class SubCat extends Model
{
    protected $fillable = [
        'name','featured_image', 'category_id', 'slug',
    ];

    //Products relation
    public function products(){
        return $this->hasMany('App\Product');
    }

    //Categories relation
    public function category(){
        return $this->belongsTo('App\Category');
    }

    //Stores relation
    public function stores(){
        return $this->belongsToMany('App\Store')->withTimestamps();
    }

    //Brands relation
    public function brands(){
        return $this->belongsToMany('App\Brand')->withTimestamps();
    }

    //Changing the route key name to use (Slugs) instead of (Ids)
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
