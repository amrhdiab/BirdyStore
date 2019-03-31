<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\setting
 *
 * @property int $id
 * @property string $website_name
 * @property string $contact_number
 * @property string $contact_email_1
 * @property string $contact_email_2
 * @property string $facebook
 * @property string $twitter
 * @property string $google
 * @property string $dribble
 * @property string $slogan
 * @property string $address
 * @property float $lat
 * @property float $lng
 * @property string $about_us
 * @property string $logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereAboutUs($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereContactEmail1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereContactEmail2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereContactNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereDribble($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereGoogle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereLng($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereTwitter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\setting whereWebsiteName($value)
 * @mixin \Eloquent
 * @property string $logo2
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Setting whereLogo2($value)
 */
class Setting extends Model
{
    protected $fillable = [
        'website_name', 'contact_number', 'contact_email_1', 'contact_email_2', 'facebook',
        'twitter', 'google', 'dribble', 'slogan', 'address', 'lat', 'lng',
        'about_us', 'logo','logo2',
    ];
}
