<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatusCategory extends Model
{
    //
    protected $table="project_status_categories";
    protected $fillable =["name","definition"];



    public function project_status(){

        return $this->hasMany(ProjectStatus::class,'id','project_status_category_id');
    }

    public function new_project(){

        return $this->hasMany(NewProject::class,'id','status_category_id');
    }


}
