<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Store
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $contact_email
 * @property string                          $contact_number
 * @property string                          $website
 * @property string                          $address
 * @property string                          $working_hours
 * @property float                           $lat
 * @property float                           $lng
 * @property string                          $avatar
 * @property string                          $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereWebsite($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereWorkingHours($value)
 * @mixin \Eloquent
 * @property string $governorate
 * @property string $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Brand[] $brands
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Category[] $categories
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Product[] $products
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubCat[] $sub_cats
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereGovernorate($value)
 * @property-read \App\Location $location
 * @property int $location_id
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Store whereLocationId($value)
 */
class Store extends Model
{
    protected $fillable = [
        'name', 'contact_email', 'contact_number', 'website', 'governorate',
        'city', 'address', 'working_hours', 'lat', 'lng', 'avatar', 'slug','location_id'
    ];

    //Categories relation
    public function categories(){
        return $this->belongsToMany('App\Category')->withTimestamps();
    }

    //Sub categories relation
    public function sub_cats(){
        return $this->belongsToMany('App\SubCat')->withTimestamps();
    }

    //Products relation
    public function products(){
        return $this->belongsToMany('App\Product')->withTimestamps();
    }

    //Brands relation
    public function brands(){
        return $this->belongsToMany('App\Brand')->withTimestamps();
    }

    public function location(){
        return $this->belongsTo('App\Location');
    }

    //Changing the route key name to use (Slugs) instead of (Ids)
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
