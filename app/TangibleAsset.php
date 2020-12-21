<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TangibleAsset
 *
 * @property int $id
 * @property string|null $tangible_asset_name
 * @property string|null $tangible_asset_quantity
 * @property int|null $tangible_category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\TangibleCategory|null $tangible_category
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset whereTangibleAssetName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset whereTangibleAssetQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset whereTangibleCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleAsset whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TangibleAsset extends Model
{
    //
    protected $table ="tangible_assets";

    protected $fillable =
        [
            "tangible_asset_name",
            "tangible_asset_quantity",
            "tangible_category_id",
        ];


    public function tangible_category()
    {
//        return $this->hasMany(Department::class);
        return $this->belongsTo(TangibleCategory::class,'tangible_category_id','id');
    }

}
