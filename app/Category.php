<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Category
 *
 * @property int $id
 * @property string $name
 * @property string $featured_image
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereFeaturedImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Brand[] $brands
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Store[] $stores
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCat[] $sub_cats
 */
class Category extends Model
{
    protected $fillable = [
        'name', 'featured_image', 'slug',
    ];

    //Sub categories relation
    public function sub_cats(){
        return $this->hasMany('App\SubCat');
    }

    //Products relation
    public function products(){
        return $this->hasManyThrough('App\Product','App\SubCat');
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
