<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\SubDepartment
 *
 * @property int $id
 * @property string $sub_department_name
 * @property int $department_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Department $department
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Designation[] $designations
 * @property-read int|null $designations_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubDepartment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubDepartment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubDepartment query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubDepartment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubDepartment whereDepartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubDepartment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubDepartment whereSubDepartmentName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\SubDepartment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SubDepartment extends Model
{
    //
    protected $table = "sub_departments";

    protected $fillable =
        [
            "sub_department_name",
            "department_id",
        ];

    public function department(){
        return $this->belongsTo(Department::class);
    }
    public function designations(){
        return $this->hasMany(Designation::class);
    }
}
