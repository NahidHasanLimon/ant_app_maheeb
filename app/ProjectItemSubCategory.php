<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectItemSubCategory extends Model
{
    //
    protected $table ="project_item_sub_categories";
    protected $fillable=
        [
            "item_sub_category_name",
            "item_category_id",

        ];


    public function item_category(){
        return $this->belongsTo(ProjectItemCategory::class,'item_category_id','id');
    }


}
