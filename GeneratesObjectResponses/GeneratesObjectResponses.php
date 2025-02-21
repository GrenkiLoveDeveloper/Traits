<?php

namespace App\Traits;

trait GeneratesObjectResponses
{
    /**
     * Возвращает успешный ответ
     *
     * @param string $message
     * @param array $dataArray
     * @param int $status
     * @return \Illuminate\Http\JsonResponse
     */
    public function success(string $message, array $dataArray = [], int $status = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $dataArray,
            'status' => $status,
        ], $status);
    }

    /**
     * Возвращает объект с ошибкой
     *
     * @param string $message
     * @param int $status
     * @param int|null $code
     * @return \Illuminate\Http\JsonResponse
     */
    public function error(string $message, int $status = 500, ?int $code = null)
    {
        return response()->json([
            'success' => false,
            'message' => $message,
            'status' => $status,
            'code' => $code,
        ], $status);
    }
}
