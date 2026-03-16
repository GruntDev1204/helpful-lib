<?php

namespace App\Helper\Code\Sub_Class;

use App\Helper\Code\CustomStatusCode;
use App\Helper\Code\HTTPStatusCode;

class SuccessCode extends CustomStatusCode
{
    public function __construct(HTTPStatusCode $httpStatusCode, int $Code, string $Message)
    {
        parent::__construct($httpStatusCode, $Code, $Message);
    }

    //expamle
    public const CREATED_HASHED_PASSWORD = 20101;
    public const LOGIN_DONE = 20000;

    public static function CREATED_HASHED_PASSWORD(string $Message = 'Created hashed password'): SuccessCode
    {
        return new SuccessCode(HTTPStatusCode::CREATED, self::CREATED_HASHED_PASSWORD, $Message);
    }

    public static function LOGIN_DONE(string $Message = 'Login Success!'): SuccessCode
    {
        return new SuccessCode(HTTPStatusCode::OK, self::LOGIN_DONE, $Message);
    }
}
