<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LeaveType
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeaveType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeaveType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeaveType query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeaveType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeaveType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeaveType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeaveType whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Leave[] $leave
 * @property-read int|null $leave_count
 */
class LeaveType extends Model
{
    //
    protected $table = "leave_types";

    public function leave(){

//        return $this->belongsTo(Leave::class,'id','leaveType');
//        return $this->belongsTo(Leave::class,'leaveType','id');
        return $this->hasMany(Leave::class,'id','leave_type');
    }


}
