<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsCategory extends Model
{
    //
    protected $table ="projects_categories";

    protected $fillable =[
        "project_category_name",
    ];



    public function subCategory(){

        return $this->hasMany(ProjectsSubCategory::class,'id','project_category_id');
    }

    public function projects(){

        return $this->hasMany(Projects::class,'id','project_category_id');
    }
}
