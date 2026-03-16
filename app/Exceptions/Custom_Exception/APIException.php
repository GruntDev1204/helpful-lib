<?php

namespace App\Exceptions\Custom_Exception;

use App\Helper\Code\Sub_Class\ErrorCode;
use App\Helper\Response\ReturnJsonHelper;

class APIException extends BaseException
{
    public function __construct(ErrorCode $errorCode, ?string $details = null)
    {
        parent::__construct($errorCode, 'API Exception', $details);
    }

    public function render()
    {
        return $this->getDetails() === null ?
            ReturnJsonHelper::returnJsonException($this->getErrorCode())
            : ReturnJsonHelper::returnJsonException($this->getErrorCode(), $this->getDetails());
    }
}
