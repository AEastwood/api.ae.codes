<?php

namespace App\Http\Controllers\Scores;

use App\Http\Controllers\Controller;
use App\Http\Requests\Scores\GetScoresIndexRequest;
use App\Http\Requests\Scores\StoreScoreRequest;
use App\Http\Resources\Scores\ScoresIndexResource;
use App\Http\Resources\Scores\StoreScoreResource;
use App\Models\Scores\Score;
use Illuminate\Http\JsonResponse;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetScoresIndexRequest $request)
    {
        $scores = Score::query()
            ->orderByDesc('score')
            ->where('game', $request->route('game'))
            ->get();

        return response()->json(ScoresIndexResource::collection($scores));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScoreRequest $request): JsonResponse
    {
        $score = Score::create($request->validated());

        return response()->json([
            'score' => new StoreScoreResource($score)
        ], 201);
    }

}
