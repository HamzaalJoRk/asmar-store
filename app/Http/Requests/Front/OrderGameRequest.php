<?php

namespace App\Http\Requests\Front;

use App\Models\Game;
use Illuminate\Foundation\Http\FormRequest;

class OrderGameRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        $game = Game::findOrFail($this->game_id);

        $rules = [
            'qty' => 'required|integer',
            'playerid' => 'required_if:' . $game->need_id_player . ',==,1|string',
            'playername' => 'required_if:' . $game->need_name_player . ',==,1|string',
            'note' => 'nullable|string|max:500',
        ];

        if ($game->have_packages) {
            $rules['package_id'] = 'required|integer|exists:packages,id';
        }

        return $rules;
    }
}
