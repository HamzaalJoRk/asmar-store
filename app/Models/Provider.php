<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Provider extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $guarded = [];
    protected $casts = [
        'api_endpoints' => 'array',
        'is_active' => 'boolean'
    ];

    public function getLogoAttribute()
    {
        return $this->getFirstMediaUrl('logo') ?: asset('images/default/provider.png');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function status()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($provider) {
            if (empty($provider->slug)) {
                $provider->slug = str()->slug($provider->name);
            }
        });
    }
}
