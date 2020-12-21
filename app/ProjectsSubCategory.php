<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectsSubCategory extends Model
{
    //
    protected $table = "projects_sub_categories";

    protected $fillable =
        [
            "projects_sub_category_name",
            "project_category_id"
        ];

    public function category(){
        return $this->belongsTo(ProjectsCategory::class,'project_category_id','id');
    }

    public function projects(){
        return $this->hasMany(Projects::class,'id','project_sub_category_id');
    }


}
