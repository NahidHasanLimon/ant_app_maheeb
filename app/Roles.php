<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = "roles";


    public function model_has_roles(){
        return $this->hasMany(ModelHasRoles::class,'id','role_id');
    }


}
