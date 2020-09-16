# 🎓  TP - PHP Object

**You will be evaluated on your ability to meet the following 📝 functional goals.**

You can use `class`, `attributs`, `methods`, `autoload`, `namespace`, `use`, `visbility`, `type hinting`, `api consume` syntax and are sensibilised about decompositoon with the `entity` and the `service` layout.

## 🦆 Previously

You've work on implementing a method named `findAll` from the `CardService` to retrieve a list of card from a web service.

## 🐧 Now

You're gonna make some conception to refactor your service method then it'll be time to implement the Controller layout and make some logic. 

___

### 👨🏻‍💻 Scaling

> 🛑 The idea is to refactor your code: tackle your technical debt.

A method should have a maximum length of 20 line, use this rule to scale your code for a better reusability and train your naming and you notion of responsibility.

#### **The CardService issue**

The method do many things: *make an http request*, *create a file*, *read from a file*, *convert string*, *build card and colors*, *build api data*... make coffee?

📝 Thing about service class or classes with a sketchy class diagram to refactor your code, do not think to fast, stop on naming, arguments, types, return types: responsibility.

<p align="center">
   <img src="https://raw.githubusercontent.com/seeren-training/PHP-Object/master/magic-deck/resources/uml/class/Service.jpg" width="60%" />
</p>


[@see code](https://github.com/seeren-training/PHP-Object/blob/master/magic-deck/src/Service/CardService.php#L12)

___

### 👨🏻‍💻 CardController

The controller is responsible to provide an http response.

> 🛑 The idea is to implement Controller layout.

You know the rule: for an url path you must trigger a Controller method. The url must be analysed to take decisions.

📝 The url path "**/cards**" must trigger the `showAll` method from the `CardController`

📝 The url path "**/cards?page=1**" must trigger the `showAll` method from the `CardController`

📝 The url path "**/cards?color=red**" must trigger the `showAll` method from the `CardController`

📝 The url path "**/cards?page=2&color=red**" must trigger the `showAll` method from the `CardController`

___

🔎 Remember about the super global GET.

You have to forge url:

```html
<a href="/votes?id=7">Vote</a>
```

You can retrieve query string paramter with `filter_input`:

```php
$id = (int) filter_input(INPUT_GET, "id");
```
___

🙉 Now that the controller is routed, we have to make the job.

___

📝 `Display` the list of card in HTML, use `templates` and all we learn.

![image](https://raw.githubusercontent.com/seeren-training/PHP-Object/master/magic-deck/resources/wireframes/card-list.png)

> Forget about the "Deck" link and the "Rdd"/"Remove" links because the visitor is not a member.

📝 `Display` the list of card by color, using "`red`", "`blue`", "`black`", "`green`", "`white`" and "" `color` parameter value.

![image](https://raw.githubusercontent.com/seeren-training/PHP-Object/master/magic-deck/resources/wireframes/card-list-colors.png)

📝 `Display` the list of card by page, using `number` for `page` parameter value.

![image](https://raw.githubusercontent.com/seeren-training/PHP-Object/master/magic-deck/resources/wireframes/card-list-navigation.png)

___

🔎 Check the api documentation.

[https://docs.magicthegathering.io/#api_v1cards_list](https://docs.magicthegathering.io/#api_v1cards_list)


* Retrieve "Red" cards:

```bash
https://api.magicthegathering.io/v1/cards?colors=red
```

* Retieve cards from 100 to 200:

```bash
https://api.magicthegathering.io/v1/cards?page=2
```

* Retieve "Red" cards from 200 to 300:

```bash
https://api.magicthegathering.io/v1/cards?page=2&colors=red
```

___

🙈 It's a really strong logic job, but this is what we decided to do, so let's go. Hum, the controller method have to deal permanently with query param value... talk about logic, make diagrams, search solutions, it's a parameter incrementation logic job.

___

### 👨🏻‍💻 Routing

> 🛑 The idea is to route to others controllers.

📝 The url path "**/user/login**" must trigger the `login` method from the `SecurityController`

📝 The url path "**/user/create**" must trigger the `create` method from the `UserController`

📝 The url path "**/cards/add?id=409741**" must trigger the `create` method from the `CardController`

📝 The url path "**/cards/remove?id=409741**" must trigger the `remove` method from the `CardController`

📝 The url path "**/deck**" must trigger the `showAll` method from the `DeckController`

📝 The url path "**/deck?page=1**" must trigger the `showAll` method from the `DeckController`

📝 The url path "**/deck?color=Red**" must trigger the `showAll` method from the `DeckController`

📝 The url path "**/deck?page=2&color=Red**" must trigger the `showAll` method from the `DeckController`

___

## 🐬 Next

An user can be interested to create an account to build his deck!

📝 `Display` the  "account creation form" with the `create` method from the `UserController`.

![image](https://raw.githubusercontent.com/seeren-training/PHP-Object/master/magic-deck/resources/wireframes/create.png)

📝 `Validate` the "account creation form" form with `error display`.

📝 `Insert the user` in the database when form is valid using `password_hash` for the password format then `redirect` him to the "user/login" url path.

📝 `Display` a login with the `login` method from the `SecurityController`.

![image](https://raw.githubusercontent.com/seeren-training/PHP-Object/master/magic-deck/resources/wireframes/login.png)

> 🛑 Stop! We have to talk about user authentication and session!

___

## 🕕 Manage your time

There is some logic coming to target your functional goal!
