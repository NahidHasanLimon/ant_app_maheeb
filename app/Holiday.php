<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Holiday
 *
 * @property int $id
 * @property string $holiday_name
 * @property string $holiday_date
 * @property string $end_date
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereHolidayDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereHolidayName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $start_date
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereStartDate($value)
 * @property int|null $types
 * @property string|null $notes
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Holiday whereTypes($value)
 */
class Holiday extends Model
{
    //
    protected $table ="holidays";
    protected $fillable = ['holiday_name','holiday_date','end_date'];

}
