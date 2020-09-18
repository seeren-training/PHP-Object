<?php

namespace MagicDeck\Controller;

use MagicDeck\Service\CardService;

class CardController
{

    public function showAll(): void
    {
        $cardService = new CardService();
        $cardList = $cardService->findAll();
        include __DIR__ . "/../../templates/card/show-all.php";
    }

}
