<?php

namespace App\Http\Controllers;

class APIController extends Controller
{
    /**
     * success response method.
     *
     * @param array $data
     * @param $message
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function success($data = [], $message = '', $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $data,
            'message' => $message,
        ];

        return response()->json($response, $code);
    }

    
    /**
     * return error response.

     * @param $message
     * @param array $errors 
     * @param $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function fail($message, $errors = [], $code = 400)
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (! empty($errors)) {
            $response['erros'] = $errors;
        }

        return response()->json($response, $code);
    }

    public function fallback()
    {
        return $this->fail(__('errors.not_found'),[],404);
    }
}