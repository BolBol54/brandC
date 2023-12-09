<?php

namespace App\Helper;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ResponseHandler
{
    public static function success(string $message, mixed $data)
    {


        return response()->json([
            'code' => 200,
            'message' => $message,
            'data' => self::previewData($data),
            'errors' => (object)[]
        ], 200);
    }

    public static function validationError(array $errors)
    {
        $data = [
            'code' => 422,
            'message' => 'Validation Error',
            'errors' => $errors,
            'data' => (object)[]
        ];

        return response()->json($data, 422);
    }

    private static function previewData($data)
    {
        if (is_array($data)) {
            return count($data) ? $data : (object)[];
        }
        // else
        // {
        //     return  $data->toArray();
        // }

        return $data;
    }
}
