<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model implements TranslatableContract
{
    use HasFactory,  Translatable;

    protected $guarded = [];
    public $translatedAttributes = ['title'];


    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    public function status()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

    // public function areas()
    // {
    //     return $this->hasMany(Area::class);
    // }

}
