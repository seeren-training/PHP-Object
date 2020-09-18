<?php

namespace MagicDeck\Service\Api;

class ApiService
{

    public function fetch(string $url, string $filename): \stdClass
    {
        $filename = __DIR__ . "/../../../var/cache/$filename";
        if (!file_exists($filename)) {
            $contents = file_get_contents($url);
            file_put_contents($filename, $contents);
        } else {
            $contents = file_get_contents($filename);
        }
        return json_decode($contents);
    }

}
