<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function scopeIsActive($query)
    {
        return $query->where('is_active',  1);
    }
    public function status()
    {
        return $this->is_active ? 'Active' : 'Inactive';
    }

}
