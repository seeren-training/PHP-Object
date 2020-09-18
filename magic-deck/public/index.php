<?php

use MagicDeck\Service\CardService;

include __DIR__ . "/../vendor/autoload.php";

$service = new CardService();

var_dump(
    $service->findAll()
);
