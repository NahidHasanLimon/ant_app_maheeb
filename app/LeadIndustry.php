<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LeadIndustry
 *
 * @property int $id
 * @property string|null $lead_industry_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadIndustry newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadIndustry newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadIndustry query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadIndustry whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadIndustry whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadIndustry whereLeadIndustryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadIndustry whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\LeadSubIndustry[] $sub_industries
 * @property-read int|null $sub_industries_count
 */
class LeadIndustry extends Model
{
    //
    protected $table = "lead_industries";

    protected $fillable =
        ["lead_industry_name"];

    public function sub_industries()
    {
        return $this->hasMany(LeadSubIndustry::class);
    }

}
