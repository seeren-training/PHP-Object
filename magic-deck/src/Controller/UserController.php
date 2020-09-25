<?php

namespace MagicDeck\Controller;

use MagicDeck\Entity\User;
use MagicDeck\Form\UserForm;
use MagicDeck\Service\UserService;

class UserController extends Controller
{

    public function create(): void
    {
        $user = new User();
        $form = new UserForm();
        $errorList = $form->fill($user);
        if ($form->isSubmitted() && $form->isValid()) {
            if ((new UserService())->insert($user)) {
                header("Location: /user/login");
                return;
            }
            $errorList["email"] = true;
        }
        $this->render("user/create.html.php", [
            "user" => $user,
            "errorList" => $errorList,
        ]);
    }

}
