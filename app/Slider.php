<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Slider
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $headline
 * @property string|null $title
 * @property string|null $sub_title
 * @property string|null $action1_title
 * @property string|null $action2_title
 * @property string|null $action1_link
 * @property string|null $action2_link
 * @property string|null $bg_media
 * @property string|null $image1
 * @property string|null $image2
 * @property string|null $image3
 * @property string|null $image1_link
 * @property string|null $image2_link
 * @property string|null $image3_link
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereAction1Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereAction1Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereAction2Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereAction2Title($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereBgMedia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereHeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereImage1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereImage1Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereImage2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereImage2Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereImage3($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereImage3Link($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Slider whereUpdatedAt($value)
 */
class Slider extends Model
{
    protected $fillable = [
        'headline','title','sub_title','action1_title','action2_title',
        'action1_link','action2_link','bg_media',
    ];
}
