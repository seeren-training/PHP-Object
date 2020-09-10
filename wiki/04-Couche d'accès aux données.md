# Couche d'accès aux données

*  🔖 **PDO**
*  🔖 **Limites**
*  🔖 **Mapping**

___

## 📑 La couche d'abstraction PDO

`Php Data Object` permets de **manipuler différent driver** de base de données.

### 🏷️ **Construction**

Le `Data Source Name` en argument un doit posséder au moins **le type de drive et le host**.

```php
$dbh = new PDO(
    "mysql:host=localhost;dbname=media_bank;charset=UTF8",
    "root",
    "", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
);
```

Il est important de **spécifier en option le mode erreur** à exceptions afin de pouvoir attraper les levables facilement et ne pas tester chaque exécution.

### 🏷️ **Requête**

```php
$sth = $dbh->prepare("SELECT * FROM `product`");
```

### 🏷️ **Valeurs**

Afin de se prémunir de toute interprétation et donc injection SQL il est préférable de **spécifier les valeurs en dehors de la chaine de caractère SQL**.

```php
$sth = $dbh->prepare("SELECT * FROM `product` WHERE `id`=:id");
$sth->bindValue(":id", 4);
```

### 🏷️ **Exécution**

```php
$sth->execute();
```

### 🏷️ **Lecture**

* Lire une ligne:

```php
$raw = $sth->fetch();
```
* Lire plusieurs lignes:

```php
$raws = $sth->fetchAll();
```

* Personnaliser le mode de lecture:

```php
$sth->setFetchMode(PDO::FETCH::ASSOC);
```

### 🏷️ **Transaction**

Dans le cas de plusieurs exécution, il est important de pouvoir annuler l'une d'entre elle si une erreur apparait. **La transaction permet de valider ou d'annuler un ensemble exécutions** contenue dans un bloc.

* Open a transaction:

```php
$dbh->beginTransaction();
```

* Cancel executions and close:

```php
$dbh->rollBack();
```

* Valid executions and close:

```php
$dbh->commit();
```

___

👨🏻‍💻 Manipulation

Manipuler la couche modèle avec une base de données.

___

##  📑 Limites de PDO

PDO par ne procède pas à un mapping objet lors d'une lecture de tables en relation et les résultats ne reflètent pas nos agrégations. Le SQL à écrire et à maintenir représente une tache fastidieuse et le nombre d'instance en vie de PDO ne possède pas de gestionnaire.

### 🏷️ **[Staticité](https://www.php.net/manual/fr/language.oop5.static.php)**

La staticité peut aider à limiter le nombre d'instance en vie de PDO.

* Déclaration:

```php
class Student
{
    static public $message = "Hello";

    static public sayHello()
    {
        echo self::$message;
    }
}
```

* Utilisation:

```php
Student:: sayHello();
```

___

👨🏻‍💻 Manipulation

Créer un [Singleton](https://fr.wikipedia.org/wiki/Singleton) pour stocker l'unique instance en vie de PDO.

___

## 📑 Mapping objet relationnel et Data Access Layer

Un ORM `définit une correspondance entre le schéma de notre base de données et de notre application`. Les classes sont des tables et leur manipulation peut modifier leur état en base de données via un manager. L'ORM [Doctrine](https://www.doctrine-project.org/projects/orm.html) utilisé sur la Framework [Symfony](https://symfony.com/) sera notre sujet de démonstration.
