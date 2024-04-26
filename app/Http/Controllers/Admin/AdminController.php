<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * check role admin
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function check()
    {
        return $this->responseSuccess(['message' => 'admin']);
    }

}
