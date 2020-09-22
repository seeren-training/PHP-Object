<?php

namespace MagicDeck\Controller;

use MagicDeck\Service\Builder\MagicCardBuilderService;
use MagicDeck\Service\CardService;

class CardController extends Controller
{

    public function showAll(): void
    {
        $this->render("card/show-all.php", [
            "optionList" => $optionList = (new MagicCardBuilderService())->buildOptionList(),
            "cardList" => (new CardService())->findAll($optionList),
        ]);
    }

}
