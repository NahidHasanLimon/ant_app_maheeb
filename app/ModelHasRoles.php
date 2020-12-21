<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasRoles extends Model
{
    //
//    public $timestamps = false;
    protected $table ="model_has_roles";
//    protected $fillable=[
//        "model_type",
//        "role_id",
//        "model_id"
//    ];

    public function roles(){
        return $this->belongsTo(Roles::class,'role_id','id');
    }


    public function users(){
        return $this->belongsTo(User::class,'model_id','id');
    }

}
