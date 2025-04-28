<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class GameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $game_i=null;
        $game_t=  DB::table('game_translations')
            ->where('locale','ar')
            ->where('game_id',$this->id)
            ->select('id')
            ->first();
        if($game_t){
            $game_i= $game_t->id;
        }
        return [
            'is_active' => 'required',
            'is_show' => 'required',
            'have_packages' => 'nullable',
            'need_name_player' => 'nullable',
            'need_id_player' => 'nullable',
            'price_qty' => 'required',
            'min_qty' => 'required|integer|min:1',
            'price_qty_package'=>'',
            'quantity_package'=>'',
            'is_active_package'=>'',
            'ar' => 'required|array',
            'ar.title' => 'required|unique:game_translations,title,'.$game_i,
            'ar.keywords' => 'required',
            'ar.name_currency' => 'required',
        ];
    }
}
