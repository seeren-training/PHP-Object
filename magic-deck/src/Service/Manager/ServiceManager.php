<?php

namespace MagicDeck\Service\Manager;

use PDO;

class ServiceManager
{

    private static ?PDO $connection = null;

    public function __construct()
    {
        $config = json_decode(
            file_get_contents(__DIR__ . "/../../../config/" . ENV . "/database.json")
        );
        ServiceManager::$connection = new PDO(
            $config->dsn,
            $config->user,
            $config->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }

    /**
     * @return PDO
     */
    public static function getConnection(): PDO
    {
        if (!ServiceManager::$connection) {
            new ServiceManager();
        }
        return ServiceManager::$connection;
    }

}
