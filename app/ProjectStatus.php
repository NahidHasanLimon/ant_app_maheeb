<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectStatus extends Model
{
    //
    protected $table="project_statuses";
    protected $fillable =["name","definition","project_status_category_id"];



    public function status_category(){
        return $this->belongsTo(ProjectStatusCategory::class,'project_status_category_id','id');
    }



}
