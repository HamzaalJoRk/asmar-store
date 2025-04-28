<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Package extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $appends=['active_string'];
    public  function  game(){
        return $this->belongsTo(Game::class);
    }
    public function getActiveStringAttribute()
    {
        $arr=[
            '0'=>'InActive',
            '1'=>'Active',

        ];
        return $arr[$this->is_active];
    }

}
