<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Category extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'name',
        'active'
    ];

    public function games()
    {
        return $this->hasMany(Game::class);
    }

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('image') ?: asset('images/default/game.png');
    }
}
