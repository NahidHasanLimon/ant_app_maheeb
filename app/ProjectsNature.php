<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsNature extends Model
{
    //

    protected $table ="projects_natures";
    protected $fillable =['project_nature_name'];



//    public function project(){
//
//        return $this->belongsTo(Projects::class,'id','project_nature_id');
//    }





}
