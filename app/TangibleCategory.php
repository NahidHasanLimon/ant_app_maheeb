<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\TangibleCategory
 *
 * @property int $id
 * @property string|null $tangible_category_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\TangibleAsset[] $tangible_asset
 * @property-read int|null $tangible_asset_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleCategory whereTangibleCategoryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\TangibleCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TangibleCategory extends Model
{
    //

    protected $table = "tangible_categories";

    protected $fillable = [
      "tangible_category_name"
    ];

    public function tangible_asset()
    {
//        return $this->hasMany(Department::class);
        return $this->hasMany(TangibleAsset::class,'id','tangible_category_id');
    }


}
