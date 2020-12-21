<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\UserInformation
 *
 * @property int $id
 * @property int $user_id
 * @property array|null $financial_information
 * @property array|null $work_experience
 * @property array|null $educational_qualification
 * @property array|null $skill
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereEducationalQualification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereFinancialInformation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereSkill($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\UserInformation whereWorkExperience($value)
 * @mixin \Eloquent
 */
class UserInformation extends Model
{
    //
    protected $table ="user_information";

    protected $fillable = [
        'user_id','financial_information','work_experience','educational_qualification','skill',
    ];
    protected $casts = [
        'financial_information' => 'json',
        'work_experience' => 'json',
        'educational_qualification' => 'json',
        'skill' => 'json',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
