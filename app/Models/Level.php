<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Level extends Model implements TranslatableContract, HasMedia
{
    use HasFactory, Translatable, InteractsWithMedia;
    protected $guarded = [];
    public $translatedAttributes = ['title'];

    protected $casts = [
        'profit_percentage' => 'decimal:2'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
