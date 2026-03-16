<?php

namespace App\Helper\Crypto;

use App\Exceptions\Custom_Exception\SystemException;
use App\Helper\Code\Sub_Class\ErrorCode;
use App\Helper\Debug\DebuggerHelper;
use Illuminate\Support\Facades\Hash;

class EncodeHelper
{
    private static function safeCallBycrypt(callable $fn)
    {
        return DebuggerHelper::safeCall(
            $fn,
            new SystemException(ErrorCode::LIB_HASH_CRASH_OR_WRONG_CONFIG('Hash Lib is Crashed! or Config is Wrong!'))
        );
    }

    public static function encodeBycrypt(string $string, $roundSalt = 10): string
    {
        return self::safeCallBycrypt(
            function () use ($string, $roundSalt) {
                return Hash::make($string, ['rounds' => $roundSalt]);
            }
        );
    }

    public static function verifyBycrypt(string $string, string $hashedString): bool
    {
        return self::safeCallBycrypt(
            function () use ($string, $hashedString) {
                return Hash::check($string, $hashedString);
            },
        );
    }
}
