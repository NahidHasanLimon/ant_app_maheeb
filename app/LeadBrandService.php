<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LeadBrandService
 *
 * @property int $id
 * @property int|null $lead_brand_id
 * @property int|null $lead_product_or_service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrandService newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrandService newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrandService query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrandService whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrandService whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrandService whereLeadBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrandService whereLeadProductOrServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadBrandService whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \App\LeadBrand|null $lead_brand
 * @property-read \App\LeadProductOrService|null $lead_product_or_service
 */
class LeadBrandService extends Model
{
    //
    protected $table ="lead_brand_services";

    protected $fillable=
        [
            "lead_brand_id",
            "lead_product_or_service_id",
        ];

    public function lead_brand()
    {
        return $this->belongsTo(LeadBrand::class);
    }
    public function lead_product_or_service()
    {
        return $this->belongsTo(LeadProductOrService::class);
    }
}
