<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Game extends Model implements TranslatableContract, HasMedia
{
    use HasFactory, Translatable, InteractsWithMedia;
    public $translatedAttributes = ['title', 'name_currency', 'keywords', 'provider_type'];

    protected $guarded = [];
    protected $casts = [
        'provider_params' => 'array'
    ];

    protected $appends = [
        'active_string',
        'name_player_string',
        'id_player_string',
        'have_packages_string',
        'is_show_string'
    ];

    public function scopeIsShow($query)
    {
        return $query->where('is_show', 1);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function getIconAttribute()
    {
        return $this->getFirstMediaUrl('icon') ?: asset('images/default/game.png');
    }
    public function getBackgroundAttribute()
    {
        return $this->getFirstMediaUrl('background') ?: asset('images/default/background-game.png');
    }
    public function getIconCurrancyAttribute()
    {
        return $this->getFirstMediaUrl('icon_coins') ?: asset('images/default/icon_coins.png');
    }
    public function getBackgroundPackageAttribute()
    {
        return $this->getFirstMediaUrl('background_package') ?: asset('images/default/background_package.png');
    }

    public function catygories()
    {
        return $this->belongsTo(Category::class);
    }

    public function getActiveStringAttribute()
    {
        $arr = [
            '0' => 'InActive',
            '1' => 'Active',

        ];
        return $arr[$this->is_active];
    }

    public function getNamePlayerStringAttribute()
    {
        $arr = [
            '0' => 'No',
            '1' => 'Yes',

        ];
        return $arr[$this->need_name_player];
    }

    public function getIdPlayerStringAttribute()
    {
        $arr = [
            '0' => 'No',
            '1' => 'Yes',

        ];
        return $arr[$this->need_id_player];
    }

    public function getHavePackagesStringAttribute()
    {
        $arr = [
            '0' => 'No',
            '1' => 'Yes',

        ];
        return $arr[$this->have_packages];
    }

    public function getIsShowStringAttribute()
    {
        $arr = [
            '0' => 'hide',
            '1' => 'show',

        ];
        return $arr[$this->is_show];
    }



    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
