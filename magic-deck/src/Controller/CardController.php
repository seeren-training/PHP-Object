<?php

namespace MagicDeck\Controller;

use MagicDeck\Service\CardService;

class CardController
{

    public function showAll(): void
    {
        $cardList = (new CardService())->findAll();
        include __DIR__ . "/../../templates/card/show-all.php";
    }

}
