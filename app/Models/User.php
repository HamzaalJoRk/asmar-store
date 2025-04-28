<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $guarded = [];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends=['level'];


    public  function getLevelAttribute()
    {
       $Level=  Level::where('amount','<=',$this->amount_orders)
            ->orderBy('sort','DESC')->first();

        return $Level?:Level::orderBy('sort')->first();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'user_id');
    }
//    public  function getMyBalanceAttribute()
//    {
//       return $this->transactions()->where('status','approved')->sum('final_total') - $this->amount_orders ;
//    }


    public function status()
    {
        return $this->is_active =='1'?'Active':'Inactive' ;
    }
    public function country() {
    	return $this->belongsTo(Country::class,'country_id');
    }
    public function city() {
    	return $this->belongsTo(City::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class, 'currency_id');
    }

    public function getExchangeRate()
    {
        $settingCurrencyid = setting('currency_id');
        $rate = Currency::whereId($settingCurrencyid)->value('rate');
        $amount = $this->user_balance;
        $convertedAmount = $amount * $rate;
        return $convertedAmount;
    }
    public function getExchangeSymbol()
    {
        $settingCurrencyid = setting('currency_id');
        $symbol = Currency::whereId($settingCurrencyid)->value('symbol');
        return $symbol;
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function getProfitPercentageAttribute()
    {
        return $this->level ? $this->level->profit_percentage : 0;
    }

}
