<?php

namespace App\Traits;

trait ApiController {

    function successResponse($message = '', $data = null, $status = 200)
    {
        return $this->generateApiResponse('success', $message, $data, $status);
    }

    function failedResponse($message = '', $status = 400, $data = null)
    {
        return $this->generateApiResponse('failed', $message, $data, $status);
    }

    public function errorResponse($message = '', $status = 500)
    {
        return $this->generateApiResponse('error', $message, $status);
    }

    public function generateApiResponse($statusText, $message = '', $data = null, $status = 400)
    {

        $responseData = [
            'status' => $statusText
        ];

        if ($message) $responseData['message'] = $message;
        if (!is_null($data)) $responseData['data'] = $data;

        return response()->json($responseData, $status);
    }
}
