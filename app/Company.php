<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Company
 *
 * @property int $id
 * @property string $company_name
 * @property string $company_logo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCompanyLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Company whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Department[] $departments
 * @property-read int|null $departments_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\SubDepartment[] $subdepartments
 * @property-read int|null $subdepartments_count
 */
class Company extends Model
{
    //
    protected $table = "companies";
    protected $fillable =
        [
          "company_name",
          "company_logo"
        ];

    public function departments()
    {
//        return $this->hasMany(Department::class);
        return $this->hasMany(Department::class,'company_id','id');
    }

//    public function subdepartments()
//    {
//        return $this->hasMany(SubDepartment::class);
//    }
//    public function designations(){
//        return $this->hasMany(Designation::class);
//    }

//    public function projects()
//    {
//        return $this->hasMany(Projects::class,'id','company_id');
//    }




}
