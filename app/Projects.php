<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = "projects";

    protected $fillable = [
        "projects_name",
        "project_nature",
        "project_frequency",
        "company_id",
        "project_sub_category_id",
        "project_category_id",
    ];


    public function organizations(){

        return $this->belongsTo(LeadCompany::class,'company_id','id');
    }

    public function subcategories(){

        return $this->belongsTo(ProjectsSubCategory::class,'project_sub_category_id','id');

    }

    public function categories(){

        return $this->belongsTo(ProjectsCategory::class,'project_category_id','id');
    }

    public function project_item()
    {
        return $this->hasMany(ProjectItem::class, 'id', 'projects_id');
    }

}
