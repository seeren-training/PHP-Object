<?php

namespace MagicDeck\Service\Session;

class SessionService
{

    public function __construct()
    {
        if (PHP_SESSION_ACTIVE !== session_status()) {
            session_start();
        }
    }

    public function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    public function destroy(): void
    {
        session_destroy();
        unset($_SESSION);
    }

}
