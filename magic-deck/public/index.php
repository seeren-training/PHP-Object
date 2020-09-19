<?php


include __DIR__ . "/../vendor/autoload.php";

$url = filter_input(INPUT_SERVER, "REQUEST_URI");

if ("/cards" === $url || "/cards?" === substr($url, 0, 7)) {
    (new \MagicDeck\Controller\CardController())->showAll();
}
