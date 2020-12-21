<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Designation
 *
 * @property int $id
 * @property string $designation_name
 * @property int $sub_department_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Department $DepDetails
 * @property-read \App\SubDepartment $sub_department
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Designation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Designation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Designation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Designation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Designation whereDesignationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Designation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Designation whereSubDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Designation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Designation extends Model
{
    //
    protected $table ="designations";
    protected $fillable=
        [
            "designation_name",
            "sub_department_id",

        ];
    public function sub_department(){
        return $this->belongsTo(SubDepartment::class);
    }
//    public function designations(){
//        return $this->hasMany(Designation::class);
//    }

    public function DepDetails()
    {
        return $this->belongsTo(Department::class, Company::class);
    }


    public function postings()
    {
        return $this->hasMany(Posting::class,'id','designation_id');
    }

}
