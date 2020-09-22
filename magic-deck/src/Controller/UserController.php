<?php

namespace MagicDeck\Controller;

class UserController extends Controller
{

    public function create(): void
    {
        $this->render("user/create.php", [
            "title" => "",
        ]);
    }

}


