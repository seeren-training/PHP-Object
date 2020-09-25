<?php

namespace MagicDeck\Controller;

use MagicDeck\Service\Session\SessionService;

class Controller
{

    protected SessionService $session;

    public function __construct()
    {
        $this->session = new SessionService();
    }

    public function render(string $template, array $data = []): bool
    {
        extract($data);
        unset($data);
        $session = $this->session;
        return include __DIR__ . "/../../templates/" . $template;
    }

}
