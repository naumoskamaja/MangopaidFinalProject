<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function returnData($status, $message, $values, $errors = null, $error = 200, $action = null)
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'values' => $values,
            'errors' => $errors,
            'error' => $error,
            'action' => $action
        ]);
    }
}
