<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    //
   public $timestamps = false;
    protected $fillable = [
        'user_id','attendance_date','is_approved_s', 'check_in','check_out','duration','approving_superAdmin_id','status',
    ];
    public function user()
	{
	     return $this->belongsTo(User::class);
	 }
}
