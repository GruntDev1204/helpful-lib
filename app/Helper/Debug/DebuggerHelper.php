<?php

namespace  App\Helper\Debug;

use Exception;

class DebuggerHelper
{
    public static function safeCall(callable $action, Exception $e)
    {
        try {
            return $action();
        } catch (Exception) {
            self::logInfo($e->getCode(), $e->getMessage());
            throw $e;
        }
    }

    public static function logInfo($code, string $message = "unknown")
    {
        $executionTime = round(((microtime(true) - LARAVEL_START) * 1000) - 0.5, 2);
        $memoryUsage = round(memory_get_peak_usage(true) / 1024 / 1024, 2);

        $logMessage = "[" . date('Y-m-d H:i:s') . "] Signal: |Code: {$code} | Message:  {$message} | Time :  {$executionTime}ms | RAM : {$memoryUsage}MB" . PHP_EOL;

        file_put_contents(storage_path('logs/checkPerform.log'), $logMessage, FILE_APPEND);
    }
}
