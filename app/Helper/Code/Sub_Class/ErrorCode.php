<?php

namespace App\Helper\Code\Sub_Class;

use App\Helper\Code\CustomStatusCode;
use App\Helper\Code\HTTPStatusCode;

class ErrorCode extends CustomStatusCode
{
    public function __construct(HTTPStatusCode $httpStatusCode, int $Code, string $Message)
    {
        parent::__construct($httpStatusCode, $Code, $Message);
    }

    //expamle
    public const LIB_HASH_CRASH_OR_WRONG_CONFIG = 50001;
    public const LOGIN_FAILED_WRONG_PASSWORD = 40101;

    public static function LIB_HASH_CRASH_OR_WRONG_CONFIG(string $Message = 'Lib hash crash or wrong config'): ErrorCode
    {
        return new ErrorCode(HTTPStatusCode::INTERNAL_SERVER_ERROR, self::LIB_HASH_CRASH_OR_WRONG_CONFIG, $Message);
    }

    public static function LOGIN_FAILED_WRONG_PASSWORD(string $Message = 'Login Failed'): ErrorCode
    {
        return new ErrorCode(HTTPStatusCode::UNAUTHORIZED, self::LOGIN_FAILED_WRONG_PASSWORD, $Message);
    }
}
