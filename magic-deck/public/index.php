<?php

include __DIR__ . "/../vendor/autoload.php";

$url = filter_input(INPUT_SERVER, "REQUEST_URI");

if ("/cards" === $url || "/cards?" === substr($url, 0, 7)) {
    (new \MagicDeck\Controller\CardController())->showAll();
} elseif ("/user/create" === $url) {
    (new \MagicDeck\Controller\UserController())->create();
} elseif ("/user/login" === $url) {
    (new \MagicDeck\Controller\SecurityController())->login();
} elseif ("/user/logout" === $url) {
    (new \MagicDeck\Controller\SecurityController())->logout();
} else {
    (new \MagicDeck\Controller\ErrorController())->show();
}
