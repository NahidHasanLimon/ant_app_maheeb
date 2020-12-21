<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Posting
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posting query()
 * @mixin \Eloquent
 */
class Posting extends Model
{
    //
    protected $table ="postings";
    protected $fillable=
        [
            "start_date",
            "end_date",
            "user_id",
            "designation_id",
            "remarks",
            "salary",
        ];

    public function designations(){

        return $this->belongsTo(Designation::class,'designation_id','id');
    }

    public function users(){

        return $this->belongsTo(User::class,'user_id','id');
    }
}
