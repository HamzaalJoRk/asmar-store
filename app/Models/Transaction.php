<?php

namespace App\Models;


use App\Traits\EmployeeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory,EmployeeTrait;
    protected $guarded=[];
    protected $casts = [
        'date_at' => 'date',
    ];
    public function scopeMyPayments($query)
    {
        return $query->where('user_id',  auth()->id());
    }
    public function scopePending($query)
    {
        return $query->where('status',  'pending');
    }
    public function status()
    {
        return $this->status ;
    }
    //rel
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    // canceled_by
    public function canceledBy()
    {
        return $this->belongsTo(Admin::class, 'canceled_by');
    }


}
