<?php

namespace MagicDeck\Service\Api;

use stdClass;

class ApiService
{

    private string $includePath;

    public function __construct()
    {
        $this->includePath = __DIR__ . "/../../../var/cache/";
    }

    public function fetch(string $url, string $filename): ?stdClass
    {
        $filename = $this->includePath . $filename;
        if (!file_exists($filename)) {
            $contents = file_get_contents($url);
            file_put_contents($filename, $contents);
        } else {
            $contents = file_get_contents($filename);
        }
        return json_decode($contents);
    }

}
