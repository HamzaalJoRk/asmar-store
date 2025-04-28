<?php
use Illuminate\Support\Facades\Storage;

 function get_helper_price($price,$with_code){
     $currency=\App\Models\Currency::first();

    if(auth()->check()){
        $currency= auth()->user()->currency;
    }

     $price_r=number_format((float)$price* $currency ->rate , 4, '.', '');
     if ($with_code){
         $price_r .= ' '.$currency->symbol;
     }

    return$price_r;
}
function get_helper_price_by_id($price,$currency_id){




     $currency=\App\Models\Currency::findOrfail($currency_id);


     $price_r=number_format((float)$price/ $currency ->rate , 4, '.', '');


    return$price_r;
}
function get_currency_code(){




    $currency=\App\Models\Currency::first();

    if(auth()->check()){
        $currency= auth()->user()->currency;
    }
    return $currency->symbol;

}



// ragab helper for image
function store_file($file,$path)
{
    $name = time().$file->getClientOriginalName();
    return $value = $file->storeAs($path, $name, 'uploads');
}
function delete_file($file)
{
    if($file!='' and !is_null($file) and Storage::disk('uploads')->exists($file)){
        unlink('uploads/'.$file);
    }
}
function display_file($name)
{
    return asset('uploads').'/'.$name;
}
