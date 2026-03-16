<?php

namespace App\Http\Controllers;

use App\Exceptions\Custom_Exception\APIException;
use App\Helper\Code\Sub_Class\ErrorCode;
use App\Helper\Code\Sub_Class\SuccessCode;
use App\Helper\Crypto\EncodeHelper;
use App\Helper\Response\ReturnJsonHelper;
use Symfony\Component\HttpFoundation\Request;

class TestController extends Controller
{
    public function hashPassword(Request $req)
    {
        $hashedPassword = EncodeHelper::encodeBycrypt($req['password']);
        return ReturnJsonHelper::returnJsonSuccess(SuccessCode::CREATED_HASHED_PASSWORD(), ['hashed password' => $hashedPassword]);
    }

    public function verifyPassword(Request $req)
    {
        $hashedPassword = EncodeHelper::verifyBycrypt($req['password'], $req['hashedPassword']);
        if (!$hashedPassword) throw new APIException(ErrorCode::LOGIN_FAILED_WRONG_PASSWORD());

        return ReturnJsonHelper::returnJsonSuccess(SuccessCode::LOGIN_DONE());
    }
}
