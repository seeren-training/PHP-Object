# Introduction

*  🔖 **Classes**
*  🔖 **Visibilité**
*  🔖 **Constructeur**
*  🔖 **Héritage et implémentation**
*  🔖 **Exceptions**

___

## 📑 [Classes, objets, méthodes et propriétés]((https://www.php.net/manual/fr/language.oop5.basic.php))


### 🏷️ **Classes**

Une classe contient des attributs et des méthodes.

```php
class Sudent
{

}
```

### 🏷️ **Objets**

Un objet est une `instance` de classe.

![image](https://raw.githubusercontent.com/seeren-training/PHP-Object/master/wiki/resources/object.png)

```php
$student = new Sudent();
```

### 🏷️ **Méthodes**

* Déclaration

```php
class Sudent
{

    public function sayHello(): void
    {
        echo 'Hello';
    }

}
```

* Invocation

```php
$student = new Sudent();
$student->sayHello();
```

### 🏷️ **Propriétés**

* Déclaration

```php
class Sudent
{

    public string $message = 'Hello';

}
```

* Utilisation

Le mot clef `$this` correspond à l'objet en cours de manipulation.

```php
class Sudent
{

    public string $message = 'Hello';

    public function sayHello(): void
    {
        echo $this->message;
    }

}

$student = new Sudent();
echo $student->message;
```

___

👨🏻‍💻 Manipulation

Déclarer une classe qui possède une méthode responsable d'inclure un template affichant la valeur des attributs d'une autre classe.

___


## 📑 [Visibilité des attributs](https://www.php.net/manual/fr/language.oop5.visibility.php)

### 🏷️ **Public**

```php
class Sudent
{

    public string $message = "Hello";

}

$student = new Sudent();
$student->message = "World";
```

Un attribut ou une méthode `public` est accessible partout.

###  🏷️ **Private**

```php
class Sudent
{

    private string $message = "Hello";   

    public function sayHello(): void
    {
        echo $this->message;
    }

}

$student = new Sudent();
$student->message = "World"; // Fatal Error
```

Un attribut ou une méthode `private` est accessible à la classe elle même.

La bonne pratique consiste à ne pas déclarer les propriétés public pour ne pas compromettre l'intégrité des données et préserver le bon fonctionnement des méthodes. En revanche les méthodes sont public parce qu'elles permettent une interaction avec l'extérieur de la classe et toute autre visibilité est une faute conceptuelle.

### 🏷️ **Protected**

```php
class Sudent
{

    protected string $message = "Hello";

}

$student = new Sudent();
echo $student->message; // Fatal Error
```

Un attribut ou une méthode `protected` est accessible à la classe elle même et ses parents/enfants, **ce niveau de visibilité concerne l'héritage**.

___

👨🏻‍💻 Manipulation

Déclarer les niveaux de visibilité appropriés.

___

## 📑 [Le constructeur](https://www.php.net/manual/fr/language.oop5.decon.php)


* Déclaration

```php
class Sudent
{

    protected string $message;

    public function __construct()
    {
        $this->message = "Hello";
    }

}
```

Le constructeur est invoqué lors de la construction de l'objet, il est intéressant pour toute `initialisation` d'attribut déclaré.

```php
$student = new Sudent();
echo $student->message;
```

___

👨🏻‍💻 Manipulation

Utiliser les constructeurs pour initialiser l'objet.

___

## 📑 L'héritage et les interfaces

### 🏷️ **[L'héritage](https://www.php.net/manual/fr/language.oop5.inheritance.php)**

Une classe peut hériter d'une autre avec le mot clef `extends`. Elle peut **accéder à l'ensemble des propriétés et méthodes qui ne sont pas private**.

L'héritage permet de `factoriser` des fonctionnalités dans la classe parente et pouvoir les utiliser dans plusieurs classes enfants. Il est possible d'utiliser extends avec une seule classe parente.

* Déclaration

```php
class Person
{

    public function sayHello(): void
    {
        echo "Hello";
    }

}

class Sudent extends Person
{
    
}

$student = new Sudent();
$student->message = "World";
```

* Construction

Si l'enfant possède un constructeur il sera invoqué. Si le parent possède un constructeur et que l'enfant ne l'a pas déclaré il sera invoqué.

En présence des deux constructeurs il faut invoquer le constructeur `parent` depuis l'enfant afin qu'il puisse initialiser l'objet correctement.

```php
class Person
{

    private string $message;

    public function __construct()
    {
        $this->message = "Hello";
    }

}

class Sudent extends Person
{

    private string $target;

    public function __construct()
    {
        parent::__construct();
        $this->target = "World";
    }

}
```

___

👨🏻‍💻 Manipulation

Utiliser l'héritage pour factoriser des fonctionnalités utilisés par plusieurs enfants existants ou à venir.

___

### 🏷️ **[Les interfaces](https://www.php.net/manual/fr/language.oop5.interfaces.php)**


Une `interface` n'est pas instanciable, elle déclare des prototypes de méthodes public. En implémentant une interface, la classe devient du type de l'interface en proposant un **standard d’interaction**.

* Déclaration

```php
interface StudentInterface
{

    public function learn(): bool

}
```

* Utilisation

Une classe implémentant l'interface doit respecter les signatures déclarées.

```php
class Sudent implements StudentInterface
{
    
    public function learn(): bool
    {
        return true;
    }

}
```

Il est possible d'implémenter plusieurs interfaces.

```php
class Sudent extends Person implements 
    StudentInterface, 
    ProgrammerInterface
{
    
    public function learn(): bool
    {
        return true;
    }

    public function code(): bool
    {
        return true;
    }

}
```

___

👨🏻‍💻 Manipulation

Déclarer et implémenter une interface pour standardiser une fonctionnalité.

___

### 🏷️ [Gestion des exceptions](https://www.php.net/manual/fr/class.exception.php)

Il est possible de créer ses propres exceptions en utilisant les notions abordées.

* Déclaration

```php
class StudentException extends Exception
{

}
```

* Utilisation

L'avantage est de pouvoir attraper une exception précise.

```php
try {
    $student = new Student();
    $student->learn();
} catch (StudentException $e) {
    echo  $e-getMessage();
}
```

___

👨🏻‍💻 Manipulation

Créer une Exception et l'utiliser dans un cas de figure pertinent.
