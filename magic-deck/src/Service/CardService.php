<?php

namespace MagicDeck\Service;

use MagicDeck\Service\Api\ApiService;
use MagicDeck\Service\Builder\CardBuilderService;

class CardService
{


    public function findAll(): array
    {
        $apiService = new ApiService();
        $cardBuilder = new CardBuilderService();
        $json = $apiService->fetch("https://api.magicthegathering.io/v1/cards", "cards.json");
        $cardList = $cardBuilder->buildCardList($json);
        return $cardList;
    }

}
