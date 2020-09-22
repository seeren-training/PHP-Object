<?php

namespace MagicDeck\Service\Builder;

class MagicCardBuilderService
{

    public function buildOptionList(): array
    {
        $optionList = [];
        if (in_array(
            $color = filter_input(INPUT_GET, "colors"),
            ["red", "green", "blue", "black", "white"]
        )) {
            $optionList["colors"] = $color;
        }
        if (!($optionList["page"] = (int)filter_input(INPUT_GET, "page"))) {
            $optionList["page"] = 1;
        }
        return $optionList;
    }

    public function buildCard(\stdClass $card): \stdClass
    {
        $card->imageUrl = $card->imageUrl ?? "";
        $card->text = $card->text ?? "";
        $card->manaCost = $card->manaCost ?? "";
        return $card;
    }

}
