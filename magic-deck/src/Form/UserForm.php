<?php

namespace MagicDeck\Form;

class UserForm implements FormInterface
{

    private array  $errorList;

    public function fill($entity): array
    {
        $this->errorList = [];
        $entity->setEmail((string)filter_input(INPUT_POST, "email"));
        $entity->setPassword((string)filter_input(INPUT_POST, "password"));
        if (!$this->isSubmitted()) {
            return [];
        }
        if (!filter_var($entity->getEmail(), FILTER_VALIDATE_EMAIL)) {
            $this->errorList["email"] = true;
        }
        if (!$entity->getPassword()) {
            $this->errorList["password"] = true;
        }
        $confirm = filter_input(INPUT_POST, "confirm");
        if (null !== $confirm && $confirm !== $entity->getPassword()) {
            $this->errorList["confirm"] = true;
        }
        return $this->errorList;
    }

    public function isValid(): bool
    {
        return !$this->errorList;
    }

    public function isSubmitted(): bool
    {
        return filter_input(INPUT_POST, "user-create")
            || filter_input(INPUT_POST, "user-login");
    }

}
