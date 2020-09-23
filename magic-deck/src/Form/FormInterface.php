<?php

namespace MagicDeck\Form;

/**
 * Describe Forms interactions
 *
 * @example
 * <code>
 *      $entity = new Foo();
 *      $form = new FooForm();
 *      $errorList = $form->fill($entity);
 *      if ($form->isSubmitted() && $form->isValid()) {
 *          // make database manipulation
 *      }
 *      $this->render("template.html.php", [
 *          "foo" => $entity,
 *          "errorList" => $errorList
 *      ];
 * </code>
 *
 */
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
