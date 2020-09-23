<?php

namespace MagicDeck\Controller;

class Controller
{

    public function render(string $template, array $vars = []): bool
    {
        extract($vars);
        return include __DIR__ . "/../../templates/" . $template;
    }

}
