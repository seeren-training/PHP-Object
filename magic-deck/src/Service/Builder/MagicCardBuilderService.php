<?php

namespace MagicDeck\Service\Builder;

class MagicCardBuilderService
{

    public function buildOptionList(string $color = null): array
    {

        $optionList = [];
        if ($color) {
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
