<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * check role store
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function check()
    {
        return response()->json([
            'status'    => 200,
            'message'   => 'store',
        ]);
    }
}
