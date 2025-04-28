<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\EmployeeTrait;

class Order extends Model
{
    use HasFactory, EmployeeTrait;
    protected $guarded = [];
    
    protected $casts = [
        'provider_response' => 'array',
        'provider_processed_at' => 'datetime'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($order) {
            if ($order->game->provider_id) {
                $order->provider_id = $order->game->provider_id;
            }
            
            $profitPercentage = $order->user_c->profit_percentage;
            $basePrice = $order->price_item;
            $order->profit = ($basePrice * $profitPercentage) / 100;
        });
    }

    public function scopeMyOrders($query)
    {
        return $query->where('user_id',  auth()->id());
    }

    public function scopePending($query)
    {
        return $query->where('status',  'pending');
    }

    public function user()
    {
        return $this->belongsTo(Admin::class);
    }

    public function user_c()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function status()
    {
        return $this->status;
    }

    public function canceledBy()
    {
        return $this->belongsTo(Admin::class, 'canceled_by');
    }

    public function getFinalPriceAttribute()
    {
        return $this->price_item + ($this->price_item * $this->user_c->profit_percentage / 100);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
}
