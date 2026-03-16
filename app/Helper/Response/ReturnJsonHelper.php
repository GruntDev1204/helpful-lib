<?php

namespace App\Helper\Response;

use App\Helper\Code\CustomStatusCode;
use App\Helper\Code\Sub_Class\ErrorCode;
use App\Helper\Code\Sub_Class\SuccessCode;

class ReturnJsonHelper
{
    private static function returnJson(bool $typeJson = true, CustomStatusCode $customCode, $data = null)
    {
        $code = $customCode->getCode();
        $message = $customCode->getMessage();
        $httpStatus = $customCode->getHTTPStatusCode()->value;

        $payload = [
            'code'    => $code,
            'message' => $message,
        ];

        if ($data !== null) {
            $typeJson ? $payload['data'] = $data : $payload['details'] = $data;
        }

        return response()->json($payload, $httpStatus);
    }

    public static function returnJsonSuccess(SuccessCode $statusCode, $data = null)
    {
        return self::returnJson(true, $statusCode, $data);
    }

    public static function returnJsonException(ErrorCode $statusCode, $details = null)
    {
        return self::returnJson(false, $statusCode, $details);
    }
}
