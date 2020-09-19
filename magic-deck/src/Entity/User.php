<?php

namespace MagicDeck\Entity;

class User
{

    private int $id;

    private string $email;

    private string $password;

    private array $cardList;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return array
     */
    public function getCardList(): array
    {
        return $this->cardList;
    }

    /**
     * @param array $cardList
     */
    public function setCardList(array $cardList): void
    {
        $this->cardList = $cardList;
    }

}
