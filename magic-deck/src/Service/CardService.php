<?php

namespace MagicDeck\Service;

use MagicDeck\Service\Api\ApiService;
use MagicDeck\Service\Builder\CardBuilderService;

class CardService
{

    public function findAll(): array
    {
        return (new CardBuilderService())
            ->buildCardList((new ApiService())->fetch(
                "https://api.magicthegathering.io/v1/cards",
                "cards.json"
            )->cards);
    }

}
