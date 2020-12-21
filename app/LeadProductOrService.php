<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LeadProductOrService
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $lead_product_or_service_name
 * @property int|null $is_lead_product_or_service
 * @property int|null $lead_sub_industry_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\LeadSubIndustry|null $lead_sub_industry
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService whereIsLeadProductOrService($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService whereLeadProductOrServiceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService whereLeadSubIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadProductOrService whereUpdatedAt($value)
 * @property-read \App\LeadBrandService $brand_services
 */
class LeadProductOrService extends Model
{
    //
    protected $table = "lead_product_or_services";

    protected $fillable=
        [
            "lead_product_or_service_name",
            "is_lead_product_or_service",
            "lead_sub_industry_id",
        ];

    public function lead_sub_industry()
    {
        return $this->belongsTo(LeadSubIndustry::class);
    }
    public function brand_services()
    {
        return $this->belongsTo(LeadBrandService::class);
    }

}
