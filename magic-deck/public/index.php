<?php

use MagicDeck\Controller\ErrorController;
use MagicDeck\Service\Logger\LoggerService;

include __DIR__ . "/../vendor/autoload.php";

define('ENV', json_decode(file_get_contents(__DIR__ . '/../config/env.json'))->env);

$url = $_SERVER['REDIRECT_URL'] ?? ($_SERVER['PATH_INFO'] ?? '/');

if ('prod' === ENV) {
    $logger = new LoggerService();
    ini_set('display_errors', 0);
    set_error_handler([$logger, 'log']);
    register_shutdown_function([$logger, 'shutdown']);
}

foreach ([
             "/cards" => "\MagicDeck\Controller\CardController::showAll",
             "/cards/(red|green|blue|black|white)" => "\MagicDeck\Controller\CardController::showAll",
             "/user/create" => "\MagicDeck\Controller\UserController::create",
             "/user/login" => "\MagicDeck\Controller\SecurityController::login",
             "/user/logout" => "\MagicDeck\Controller\SecurityController::logout",
         ] as $key => $value) {
    if (preg_match("#^$key$#", $url, $match)) {
        array_shift($match);
        $controllerInfo = explode('::', $value);
        $controllerName = $controllerInfo[0];
        $controllerAction = $controllerInfo[1];
        (new $controllerName())->{$controllerAction}(... $match);
        exit;
    }
}

$controller = new ErrorController();
$controller->show();
