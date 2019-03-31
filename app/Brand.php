<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Brand
 *
 * @property int $id
 * @property string $name
 * @property string $avatar
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Store[] $stores
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCat[] $sub_cats
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Brand whereDescription($value)
 */
class Brand extends Model
{
    protected $fillable = [
        'name', 'avatar', 'slug','description',
    ];

    //Products relation
    public function products(){
        return $this->hasMany('App\Product');
    }

    //Categories relation
    public function categories(){
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    //Sub categories relation
    public function sub_cats(){
        return $this->belongsToMany('App\SubCat')->withTimestamps();
    }

    //Stores relation
    public function stores(){
        return $this->belongsToMany('App\Store')->withTimestamps();
    }

    //Changing the route key name to use (Slugs) instead of (Ids)
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
