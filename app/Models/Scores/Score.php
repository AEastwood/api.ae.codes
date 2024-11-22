<?php

namespace App\Models\Scores;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $fillable = [
        'game',
        'name',
        'score',
    ];
}
