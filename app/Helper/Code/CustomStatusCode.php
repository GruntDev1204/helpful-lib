<?php

namespace App\Helper\Code;

class CustomStatusCode
{
    private int $Code;
    private string $Message;
    private HTTPStatusCode $httpStatusCode;

    public function __construct(HTTPStatusCode $httpStatusCode, int $Code, string $Message)
    {
        $this->Code = $Code;
        $this->Message = $Message;
        $this->httpStatusCode = $httpStatusCode;
    }

    public function getCode(): int
    {
        return $this->Code;
    }

    public function getMessage(): string
    {
        return $this->Message;
    }

    public function getHTTPStatusCode(): HTTPStatusCode
    {
        return $this->httpStatusCode;
    }
}
