<?php

namespace MagicDeck\Controller;

class Controller
{

    protected string $pathTemplate = __DIR__ . "/../../templates/";

    public function render(string $pathName, array $values)
    {

        extract($values);
        include $this->pathTemplate . $pathName;
    }

}
