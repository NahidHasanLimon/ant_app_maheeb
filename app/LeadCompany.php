<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\LeadCompany
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadCompany newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadCompany newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadCompany query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $lead_company_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadCompany whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadCompany whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadCompany whereLeadCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\LeadCompany whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\LeadBrand[] $brands
 * @property-read int|null $brands_count
 */
class LeadCompany extends Model
{
    //

    protected $table = "lead_companies";
    protected $fillable = [
        "lead_company_name"
    ];

    public function brands()
    {
        return $this->hasMany(LeadBrand::class);
    }

    public function projects()
    {
        return $this->hasMany(Projects::class, 'id', 'company_id');
    }

    public function new_project()
    {
        return $this->hasMany(NewProject::class,'id','lead_company_id');
    }


}
