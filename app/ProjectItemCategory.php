<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectItemCategory extends Model
{
    //
    protected $table ="project_item_categories";

    protected $fillable=[
        "item_category_name"
    ];

    public function item_sub_category(){

        return $this->hasMany(ProjectItemSubCategory::class,'id','item_category_id');
    }


    public function item(){

        return $this->hasMany(Items::class,'id','item_category_id');
    }

}
