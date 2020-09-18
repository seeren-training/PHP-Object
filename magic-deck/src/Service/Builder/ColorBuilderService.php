<?php

namespace MagicDeck\Service\Builder;

use MagicDeck\Entity\Color;

class ColorBuilderService
{

    public function buildColorList(array $apiColorList): array
    {
        $colorList = [];
        foreach ($apiColorList as $value) {
            $color = new Color();
            $color->setValue($value);
            $colorList[] = $color;
        }
        return $colorList;
    }

}
