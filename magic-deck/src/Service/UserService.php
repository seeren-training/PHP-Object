<?php

namespace MagicDeck\Service;

use PDO;
use MagicDeck\Service\Manager\ServiceManager;
use MagicDeck\Entity\User;

class UserService
{

    public function findOneByEmail(string $email): ?User
    {
        $sth = ServiceManager::getConnection()
            ->prepare("SELECT `id`, `email`, `password`, `creation` FROM `user` WHERE `email` = :email");
        $sth->execute([":email" => $email]);
        $sth->setFetchMode(PDO::FETCH_CLASS, User::class);
        return ($user = $sth->fetch()) ? $user : null;
    }

    public function insert(User $user): bool
    {
        return !$this->findOneByEmail($user->getEmail())
            ? ServiceManager::getConnection()
                ->prepare(
                    "INSERT INTO `user` (`email`, `password`, `creation`) VALUES (:email, :password, :creation);"
                )->execute([
                    ":email" => $user->getEmail(),
                    ":password" => password_hash($user->getPassword(), PASSWORD_DEFAULT),
                    ":creation" => time(),
                ])
            : false;
    }

}
