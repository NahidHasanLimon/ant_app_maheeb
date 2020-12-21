<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\ToDo
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $label
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ToDo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ToDo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ToDo query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ToDo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ToDo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ToDo whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ToDo whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ToDo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ToDo extends Model
{
    //

    protected $table ="todos";

    protected $fillable =
        [
            "title",
            "label",
        ];
}
