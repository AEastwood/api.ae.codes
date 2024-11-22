<?php

namespace App\Http\Requests\Scores;

use App\Enums\Scores\GameTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreScoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'game' => ['required', Rule::enum(GameTypes::class)],
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'score' => ['required', 'numeric', 'min:1'],
        ];
    }
}
