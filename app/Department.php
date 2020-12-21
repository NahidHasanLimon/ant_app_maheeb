<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Department
 *
 * @property int $id
 * @property string|null $company_name
 * @property string|null $company_logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereCompanyLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $department_name
 * @property int|null $company_id
 * @property-read \App\Company|null $company
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereCompanyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Department whereDepartmentName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubDepartment[] $subdepartments
 * @property-read int|null $subdepartments_count
 */
class Department extends Model
{
    //
    protected $table = "departments";

    protected $fillable=
        [
          "department_name",
            "company_id"
        ];
    public function company()
    {
//        return $this->belongsTo(Company::class);
        return $this->belongsTo(Company::class,'company_id','id');
    }

    public function subdepartments(){
        return $this->hasMany(SubDepartment::class);
    }
//    public function designations(){
//        return $this->hasMany(Designation::class);
//    }
}
