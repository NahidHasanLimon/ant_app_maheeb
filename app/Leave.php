<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Leave
 *
 * @property int $id
 * @property int $userId
 * @property string $start_date
 * @property string $end_date
 * @property string $notes
 * @property int $approvedBy_1
 * @property int $approvedBy_2
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereApprovedBy1($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereApprovedBy2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $user_id
 * @property int|null $leave_type
 * @property int|null $is_approved
 * @property string|null $approved_date
 * @property-read \App\LeaveType|null $type
 * @property-read \App\User|null $users
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereApprovedDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Leave whereLeaveType($value)
 */
class Leave extends Model
{
    //
    protected $table = "leaves";
    protected $fillable=[
        'user_id',
        'start_date',
        'end_date',
        'notes_by_requester',
        'leave_type',
        'documents',
        'is_approved_superadmin',
        'is_approved_supervisor',
        'superadmin_approval_date',
        'supervisor_approval_date',
        'approving_superadmin_id',
        'approving_supervisor_id',
    ];

    public function users(){

        return $this->belongsTo(User::class,'user_id','id');
    }


    public function type(){

//        return $this->hasMany(LeaveType::class,'leaveType','id');
        return $this->belongsTo(LeaveType::class,'leave_type','id');
    }
     public function approving_superadmin(){
        return $this->belongsTo(User::class,'approving_superadmin_id','id');
    }
     public function approving_supervisor(){
            return $this->belongsTo(User::class,'approving_supervisor_id','id');
        }

}
