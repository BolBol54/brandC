<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public function __construct(string $message, public $data = [], $code = 400)
    {
        $this->code = $code;
        $this->message = $message;
        $this->data = $data;
    }

    public function render()
    {
        return response()->json([
            'code' => $this->code,
            'message' => $this->message,
            'data' => $this->previewData($this->data),
            'errors' => (object)[]
        ], $this->code);
    }

    private function previewData($data)
    {
        if (is_array($data)) {
            return count($data) ? $data : (object)[];
        }

        return $data;
    }
}
