<?php

namespace MagicDeck\Controller;

use MagicDeck\Service\CardService;

class CardController
{

    public function showAll(): void
    {
        $service = new CardService();
        $optionList = [];
        $color = filter_input(INPUT_GET, "color");
        $optionList["page"] = (int)filter_input(INPUT_GET, "page");
        if (in_array($color, ["red", "green", "blue", "black", "white"])) {
            $optionList["colors"] = $color;
        }
        if (!$optionList["page"]) {
            $optionList["page"] = 1;
        }
        $previous = $next = $optionList;
        $previous["page"] = $previous["page"] - 1;
        $next["page"] = $next["page"] + 1;
        $cardList = $service->findAll($optionList);
        include __DIR__ . "/../../templates/card/show-all.php";
    }

}
