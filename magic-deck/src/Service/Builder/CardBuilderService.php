<?php

namespace MagicDeck\Service\Builder;

use MagicDeck\Entity\Card;

class CardBuilderService
{

    public function buildCardList(array $apiCardList): array
    {
        $cardList = [];
        $colorBuilder = new ColorBuilderService();
        $apiCardBuilder = new ApiCardBuilderService();
        foreach ($apiCardList as $value) {
            $apiCardBuilder->buildCard($value);
            if ($value->imageUrl) {
                $card = new Card();
                $card->setManaCost($value->manaCost);
                $card->setName($value->name);
                $card->setDescription($value->text);
                $card->setImage(str_replace("http", "https", $value->imageUrl));
                $card->setType($value->type);
                $card->setColorList($colorBuilder->buildColorList($value->colors));
                $cardList[] = $card;
            }
        }
        return $cardList;
    }

}
