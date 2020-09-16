# Fetch card List

This project is a deck builder for Magic The Gathering card game.

## Objectif

### Retrieve data from web service
Implements a method to retrieve a Card collection (return an array with cards). 
In a file `Service/CardService.php` and in a class `CardService` and in the method `findAll`.

* getCards
* get
* retieveAll
* fetchAll
* findAll
* findAllByColor
* findAllByPage

### Syntaxe needed

* Fetch data

```php
$url = "https://api.magicthegathering.io/v1/cards";
$jsonString = file_get_contents($url);
```

* Convert JSON string in object

```php
$jsonObject = json_decode($jsonString);
```

* Store response in cache

```php
file_put_contents(__DIR__ . "/../var/cache/cards.json", $jsonString);
```

### More

* Convert objects in string

```php
$objectSerialized = serialize($jsonObject);
```

* Convert string in object

```php
$jsonObject = unserialize($objectSerialized);
```