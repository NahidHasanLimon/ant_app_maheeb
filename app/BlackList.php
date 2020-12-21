<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\BlackList
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $label
 * @property int|null $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\BlackList whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BlackList extends Model
{
    //

    protected $table = "blacklists";

    protected $fillable =
        [
            "title",
            "label",
            "status"
        ];


}
