<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DefaultController extends Controller
{

    /**
     * Return a default json response for the default route
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Just doing api stuff'
        ]);
    }

}
