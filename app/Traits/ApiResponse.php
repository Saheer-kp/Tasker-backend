<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait ApiResponse
{
    /**
     * common response for success
     */
    public function successResponse(array $data, string $message = 'Sucess', int $statusCode = 200): JsonResponse
    {
        return response()->json(array_merge([
            'success' => true,
            'message' => $message,
        ], $data), $statusCode);
    }

    /**
     * common response for error
     */
    public function errorResponse(string $message = "Error", int $statusCode = 500, array $data = []): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($data)) {
            $response['errors'] = $data;
        }

        return response()->json($response, $statusCode);
    }
}
