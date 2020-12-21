<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectItem extends Model
{
    //
    protected $table = "project_items";


    protected $fillable =
        [
            "item_id",
            "projects_id",
            "qty",
            "unit_price",
        ];


    public function item()
    {
        return $this->belongsTo(Items::class, 'item_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Projects::class, 'projects_id', 'id');
    }


}
