<?php

namespace App\Http\Controllers\Scores;

use App\Http\Controllers\Controller;
use App\Http\Requests\Scores\GetScoresIndexRequest;
use App\Http\Requests\Scores\StoreScoreRequest;
use App\Http\Resources\Scores\ScoresIndexResource;
use App\Http\Resources\Scores\StoreScoreResource;
use App\Models\Scores\Score;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class ScoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GetScoresIndexRequest $request)
    {
        $game = $request->route('game');

        $scores = Cache::rememberForever("api.{$game}.scores.index", function () use ($game) {
            return Score::query()
                ->select([
                    'game',
                    'name',
                    'score',
                ])
                ->orderByDesc('score')
                ->where('game', $game)
                ->limit(10)
                ->get();
        });

        return response()->json(ScoresIndexResource::collection($scores));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreScoreRequest $request): JsonResponse
    {
        $game = $request->route('game');
        Cache::forget("api.{$game}.scores.index");

        $score = Score::create($request->validated());

        return response()->json([
            'score' => new StoreScoreResource($score)
        ], 201);
    }

}
