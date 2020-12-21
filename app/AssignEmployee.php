<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\AssignEmployee
 *
 * @property int $id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $user_id
 * @property int|null $designation_id
 * @property string|null $remarks
 * @property float|null $salary
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereDesignationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereSalary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\AssignEmployee whereUserId($value)
 * @mixin \Eloquent
 */
class AssignEmployee extends Model
{
    //
    protected $table ="assign_employees";
    protected $fillable=
        [
            "start_date",
            "end_date",
            "user_id",
            "designation_id",
            "remarks",
            "salary",
        ];
//    public function designation(){
//
//        return $this->belongsTo(Designation::class);
//    }

//    public function user(){
//
//        return $this->belongsTo(User::class);
//    }






}
