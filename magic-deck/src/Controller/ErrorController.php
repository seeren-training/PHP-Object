<?php

namespace MagicDeck\Controller;

class ErrorController extends Controller
{

    public function show(): void
    {
        $this->render("error/show.html.php");
    }

}