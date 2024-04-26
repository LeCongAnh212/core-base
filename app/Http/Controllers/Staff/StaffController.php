<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    /**
     * check role staff
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function check()
    {
        return $this->responseSuccess(['message' => 'staff']);
    }
}
