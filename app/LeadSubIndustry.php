<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LeadSubIndustry
 *
 * @property-read \App\LeadIndustry $lead_industry
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadSubIndustry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadSubIndustry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadSubIndustry query()
 * @mixin \Eloquent
 * @property int $id
 * @property string|null $lead_sub_industry_name
 * @property int|null $lead_industry_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadSubIndustry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadSubIndustry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadSubIndustry whereLeadIndustryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadSubIndustry whereLeadSubIndustryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadSubIndustry whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\LeadProductOrService[] $product_or_services
 * @property-read int|null $product_or_services_count
 */
class LeadSubIndustry extends Model
{
    //

    protected $table ="lead_sub_industries";
    protected $fillable =
        [
          "lead_sub_industry_name",
          "lead_industry_id",
        ];

    public function lead_industry()
    {
        return $this->belongsTo(LeadIndustry::class);
    }
    public function product_or_services()
    {
        return $this->hasMany(LeadProductOrService::class);
    }
}
