<?php

namespace MagicDeck\Service;

use MagicDeck\Service\Api\ApiService;
use MagicDeck\Service\Builder\CardBuilderService;

class CardService
{

    public function findAll(array $optionList): array
    {
        $queryString = http_build_query($optionList);
        return (new CardBuilderService())->buildCardList((new ApiService())->fetch(
            "https://api.magicthegathering.io/v1/cards?$queryString",
            "cards.$queryString.json"
        )->cards);
    }

}
