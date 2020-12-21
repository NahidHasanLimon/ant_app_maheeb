<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    //
    protected $table = "items";

    protected $fillable =
        [
            "item_name",
            "item_category_id",
        ];


    public function item_category()
    {

        return $this->belongsTo(ProjectItemCategory::class, 'item_category_id', 'id');
    }


    public function project_item()
    {

        return $this->hasMany(ProjectItem::class, 'id', 'item_id');
    }


}
