<?php

namespace App;

use Composer\XdebugHandler\Status;
use Illuminate\Database\Eloquent\Model;

class NewProject extends Model
{
    //
    protected $table = "new_projects";
    protected $fillable = [

        "lead_brand_id",
        "lead_company_id",
        "projects_name",
        "status_category_id",
        "status_id",
        "kam_id",
        "work_order_month",
        "project_complete_month",
        "revenue",
        "cost",
        "usable_revenue",
        "type",
        "journal_link",

    ];

    public function lead_company()
    {
        return $this->belongsTo(LeadCompany::class, 'lead_company_id', 'id');
    }

//    public function lead_brand()
//    {
////        return $this->belongsTo(LeadBrand::class,'id','lead_brand_id');
//        return $this->hasMany(LeadBrand::class,'id','lead_brand_id');
//    }

    public function user()
    {
        return $this->belongsTo(User::class, 'kam_id', 'id');
    }

    public function status_category()
    {
        return $this->belongsTo(ProjectStatusCategory::class,'status_category_id','id');
    }

}
