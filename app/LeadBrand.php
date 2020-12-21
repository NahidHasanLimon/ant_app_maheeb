<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LeadBrand
 *
 * @property int $id
 * @property string $lead_brand_name
 * @property int $lead_company_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrand query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrand whereLeadBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrand whereLeadCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrand whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\LeadCompany $lead_company
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\LeadBrandService[] $brand_services
 * @property-read int|null $brand_services_count
 */
class LeadBrand extends Model
{
    //
    protected $fillable= [
        "lead_brand_name",
        "lead_company_id",
    ];

    public function lead_company()
    {
        // return $this->belongsTo('App\LeadGeneration\LeadCompany');
        // return $this->belongs_to('App\LeadGeneration\LeadCompany', 'lead_company_id');
        return $this->belongsTo(LeadCompany::class);
    }
    public function brand_services()
    {
        return $this->hasMany(LeadBrandService::class);
    }

//    public function new_project()
//    {
////        return $this->hasMany(NewProject::class,'id','lead_brand_id');
//        return $this->belongsTo(NewProject::class,'id','lead_brand_id');
//    }

}
