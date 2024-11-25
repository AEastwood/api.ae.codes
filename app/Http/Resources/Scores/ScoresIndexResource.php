<?php

namespace App\Http\Resources\Scores;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScoresIndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'game' => $this->game,
            'name' => $this->name,
            'score' => $this->score,
        ];
    }
}
