<?php

namespace MagicDeck\Service\Logger;

class LoggerService
{

    private string $includePath;

    public function __construct()
    {
        $this->includePath = __DIR__ . "/../../../var/log";
    }

    public function log(int $code, string $message, string $file, int $line): void
    {
        $fileName = $this->includePath . '/' . date('Y-m-d') . '.log';
        $logLine = $code . '-[' . date('h:m:s') . '] ' . $message . 'in file ' . $file . '(' . $line . ')';
        $file = fopen($fileName, "ab");
        fwrite($file, $logLine . "\n");
        fclose($file);
    }

    public function shutdown(array $error = null)
    {
        if ($error || ($error = error_get_last())) {
            $this->log($error["type"], $error["message"], $error["file"], $error["line"]);
        }
    }

}
