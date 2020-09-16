<?php

namespace MagicDeck\Service;

use MagicDeck\Entity\Card;
use MagicDeck\Entity\Color;

class CardService
{

    /**
     * Berk!
     */
    public function findAll(): array
    {
        $cardList = [];
        $filename = __DIR__ . "/../../var/cache/cards.json";
        if (!file_exists($filename)) {
            $url = "https://api.magicthegathering.io/v1/cards";
            $contents = file_get_contents($url);
            file_put_contents($filename, $contents);
        } else {
            $contents = file_get_contents($filename);
        }
        $json = json_decode($contents);
        foreach ($json->cards as $value) {
            $card = new Card();
            if (!property_exists($value, "text")) {
                $value->text = "";
            }
            if (!property_exists($value, "imageUrl")) {
                $value->imageUrl = "";
            }
            if (!property_exists($value, "manaCost")) {
                $value->manaCost = "";
            }
            $card->setName($value->name);
            $card->setDescription($value->text);
            $card->setImage($value->imageUrl);
            $card->setManaCost($value->manaCost);
            $card->setType($value->type);
            $colorList = [];
            foreach ($value->colors as $subValue) {
                $color = new Color();
                $color->setValue($subValue);
                $colorList[] = $color;
            }
            $card->setColorList($colorList);
            $cardList[] = $card;
        }
        return $cardList;
    }

}
