<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Subscription
 *
 * @property int $id
 * @property string|null $account_name
 * @property string|null $account_email
 * @property string|null $account_password
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $payment_status
 * @property string|null $module
 * @property string|null $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereAccountEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereAccountPassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereModule($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Subscription whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Subscription extends Model
{
    //
    protected $table = "subscriptions";

    protected $fillable =
        [
            "account_name",
            "account_email",
            "account_password",
            "start_date",
            "end_date",
            "payment_status",
            "module",
            "amount",
        ];


}
