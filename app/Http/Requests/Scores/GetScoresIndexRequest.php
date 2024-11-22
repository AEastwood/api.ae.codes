<?php

namespace App\Http\Requests\Scores;

use App\Enums\Scores\GameTypes;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetScoresIndexRequest extends FormRequest
{

    /**
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'game' => $this->route('game')
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'game' => ['required', Rule::enum(GameTypes::class)],
        ];
    }
}
