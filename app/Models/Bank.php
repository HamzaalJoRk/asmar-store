<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = "banks";
    protected $guarded = [];

    public function status()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active',  1);
    }
}
