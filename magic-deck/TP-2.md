# 🎓  TP - PHP Object

**You will be evaluated on your ability to meet the following 📝 functional goals.**

You can use `class`, `attributs`, `methods`, `autoload`, `namespace`, `use`, `visbility`, `type hinting`, `web services`, `refactoring`, `generalization`, `implementation` syntax and are sensibilised about decompositoon with the `controller`, `template`, `entity`, `form` and the `service` layout.

## 🐧 Previously

You've work on implementing an interface for your forms.

## 🐬 Now

You're gonna implements interface methods to trigger your functionnals goals making logic with good practices then perform database operations.

___

### 👨🏻‍💻 UserForm

Interface handle interaction standards.

> 🛑 The idea is to validate your form.

📝 Using the `FormInterface` we decides, you have to implement methods to make your logic.

```php
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

```

The form must be used as described in the example with some possible modification. 

> Remember about classes, you declare attributes, methods and constructor, he is called when the class is instanciated, it can declare arguments like methods, his job is to initialize attributes value.

📝 Display `errors` in the template and take care about `XSS` and confirmation.

___

 🙉 *Optional* - You do not declare type for entity and that's so shame: do you have a solution please?

___

### 👨🏻‍💻 UserController

The service layout handle business logic.

> 🛑 The idea is to insert `User` in the database.

You have to perform database operation using the UserController, `UserService` and `ManagerService` to store PDO instance like in the diagram below.

![!image](https://raw.githubusercontent.com/seeren-training/PHP-Object/master/magic-deck/resources/uml/class/UserController.jpg)

📝 Create a `ManagerService` to handle database connection, instanciate `PDO` in the constructor.

📝 Create `findByEmail` in the `UserService` to find an User by email.

📝 Create `insert` in the `UserService` to insert User in your database for non existing email.

> You do not have to store the clear user password and must use the [password_hash](https://www.php.net/manual/fr/function.password-hash.php) function to make the strong hashed password you want to store.

📝 Insert the `User` in the database then redirect him to the "`/user/login`" path.

___

### 👨🏻‍💻 SecurityController

Authentification is SecurityController.

> 🛑 The idea is to loggin `User` and repeat previous usages.

📝 The url path "`/user/login`" must trigger the `login` method from the `SecurityController`

📝 The `login` method must display a form and  use `UserForm` to validate form and display errors in the template

📝 When form is valid, use `UserService` `findByEmail` method to select the User for the filled email

📝 When filled password `match` with stored password, redirect to "`/cards`"

> The filled password is clear whereas the stored password is hashed, use the [password_verify](https://www.php.net/manual/fr/function.password-verify.php) function to check the match.

___

## 🦈 Next

> 🛑 The idea is to use session

The particular super global SESSION is used to store data in an associative array. The mecanisme allow to remember stored information to an other page, these informations are linked to the user. Execute this code to understand mecanisme.

```php
if (!array_key_exists("count", $_SESSION)) {
    $_SESSION["count"] = 0;
}

echo ++$_SESSION["count"];
```

📝 When the user password match, store him in th session before redirect

📝 In template, provide Deck link to "`/deck`" when user is in the session, so he is considerated as login, otherwise, provide Login link to "`/user/login`".

📝 The url path "`/user/logout`" must trigger the `logout` method of the `SecurityController`.

📝 The `logout` method of the `SecurityController` must destroy the session and redirect him to "`/cards`".

Check full and tricky explaination about [session](https://github.com/seeren-training/PHP/wiki/10).

> 🛑 You know what to do, we have a deck to manage!

___

## 🕕 Manage your time

There is some logic coming to target your functional goal!
