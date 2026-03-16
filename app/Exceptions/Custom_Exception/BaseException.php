<?php

namespace App\Exceptions\Custom_Exception;

use App\Helper\Code\Sub_Class\ErrorCode;
use Exception;

class BaseException extends Exception
{
    private ErrorCode $errorCode;
    private ?string $details;
    private string $type;

    public function __construct(ErrorCode $errorCode, string $type = 'Error', ?string $details = null)
    {
        parent::__construct($errorCode->getMessage(), $errorCode->getHTTPStatusCode());
        $this->errorCode = $errorCode;
        $this->details = $details;
        $this->type = $type;
    }

    public function getErrorCode(): ErrorCode
    {
        return $this->errorCode;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getDetails(): string
    {
        return $this->details;
    }
}
