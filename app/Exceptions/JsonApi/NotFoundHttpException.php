<?php

namespace App\Exceptions\JsonApi;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NotFoundHttpException extends Exception
{
    /**
     * Render the exception as an HTTP response.
     */
    public function render(Request $request): JsonResponse
	{
        return response()->json([
            'errors' => [
                [
                    'title' => 'Not Found',
                    'detail' => 'Resource not found',
                    'status' => '404'
                ]
            ]
        ], 404);
    }
}
