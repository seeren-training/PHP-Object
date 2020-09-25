<?php

namespace MagicDeck\Form;

interface FormInterface
{

    /**
     * Fill entity with casted request data
     *
     * @param $entity mixed
     * @return array error list
     */
    public function fill($entity): array;

    /**
     * Is the form valid
     *
     * @return bool
     */
    public function isValid(): bool;

    /**
     * Is the form submitted
     *
     * @return bool
     */
    public function isSubmitted(): bool;

}
