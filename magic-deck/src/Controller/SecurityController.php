<?php

namespace MagicDeck\Controller;

use MagicDeck\Entity\User;
use MagicDeck\Form\UserForm;
use MagicDeck\Service\UserService;

class SecurityController extends Controller
{

    public function login(): void
    {
        $user = new User();
        $form = new UserForm();
        $errorList = $form->fill($user);
        if ($form->isSubmitted() && $form->isValid()) {
            $existingUser = (new UserService())->findOneByEmail($user->getEmail());
            if ($existingUser && password_verify($user->getPassword(), $existingUser->getPassword())) {
                $this->session->set("user", $user);
                header("Location: /cards");
                exit;
            }
            $errorList["user"] = true;
        }
        $this->render("security/login.html.php", [
            "user" => $user,
            "errorList" => $errorList,
        ]);
    }

    public function logout(): void
    {
        $this->session->destroy();
        header("Location: /cards");
        exit;
    }

}
