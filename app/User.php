<?php

namespace App;

use App\Notifications\MailResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\User
 *
 * @property int $id
 * @property string $first_name
 * @property string|null $middle_name
 * @property string|null $last_name
 * @property string $email
 * @property string $personal_email
 * @property string|null $mobile_number
 * @property string|null $gender
 * @property string|null $present_address
 * @property string|null $permanent_address
 * @property string|null $fb_username
 * @property string|null $emergency_person_name
 * @property string|null $emergency_person_relation
 * @property string|null $emergency_number
 * @property string|null $discord_id
 * @property string|null $blood_group
 * @property string|null $dob
 * @property string|null $photo
 * @property string|null $identification_number
 * @property string|null $identification_photo
 * @property string|null $identification_type
 * @property string|null $medical_condition
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property int $is_approved
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereBloodGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDiscordId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereDob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmergencyNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmergencyPersonName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmergencyPersonRelation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFbUsername($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIdentificationNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIdentificationPhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIdentificationType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsApproved($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMedicalCondition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereMobileNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePermanentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePersonalEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePresentAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read mixed $full_name
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Leave[] $leaves
 * @property-read int|null $leaves_count
 * @property-read \App\UserInformation|null $user_information
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = "users";

//    protected $fillable = [
//        'name', 'email', 'password',
//    ];
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'financial_statements',
    ];


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'financial_statements' => 'json',
        'work_experience' => 'json'
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    public function leaves()
    {

        return $this->hasMany(Leave::class, 'id', 'user_id');
    }


    public function attendance_log()
    {

        return $this->belongsTo(AttendanceLog::class, 'id', 'user_id');
    }


    public function user_information()
    {
        return $this->hasOne(UserInformation::class);
    }


    public function postings()
    {
        return $this->hasMany(Posting::class, 'id', 'user_id');
    }

    public function user_designation()
    {

        $posting = Posting::all();
        if ($posting) {
            $designation_id = Posting::where('user_id', \Auth::user()->id)->whereNull('end_date')->pluck('designation_id');
            $designation = Designation::whereIn('id', $designation_id)->get();
            return $designation;
        } else {
            return "";
        }
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordNotification($token));

    }

    public function model_has_roles()
    {
        return $this->hasMany(ModelHasRoles::class, 'id', 'model_id');
    }

    public function new_project()
    {
        return $this->hasMany(NewProject::class,'id','kam_id');
    }

}
