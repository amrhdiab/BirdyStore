<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Location
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Store[] $stores
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $governorate
 * @property string $city
 * @property float $lng_gov
 * @property float $lat_gov
 * @property float $lng_city
 * @property float $lat_city
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereGovernorate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereLatCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereLatGov($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereLngCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereLngGov($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Location whereUpdatedAt($value)
 */
class Location extends Model
{
    protected $fillable = [
        'governorate','city','lng_gov','lat_gov','lng_city','lat_city',
    ];

    public function stores(){
        return $this->hasMany('App\Store');
    }
}
