# XML et PHP

*  🔖 **SimpleXML**
*  🔖 **Modèles DOM et SAX**
*  🔖 **Création**

___

## 📑 [SimpleXML](https://www.php.net/manual/fr/simplexml.examples-basic.php)

* Construction

```php
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8" ?><product/>');
```

### 🏷️ **Ajouter un enfant**

* Enfant sans contenu

```php
$child = $xml->addChild("color");
```

### 🏷️ **Ajouter du contenu**

Le second argument optionnel doit échapper ses caractères.

```php
$child = $xml->addChild("color", "Red");
```

La syntaxe suivant échappe les caractères.

```php
$child[0] = "Red&Orange";
```

### 🏷️ **Ajouter un attribut**

Le second argument ne doit pas échapper ses caractères.

```php
$child->addAttribute("rate", 5);
```

### 🏷️ **Accéder à un enfant**

```php
$xml->color;
```

```php
$xml->color[0]->price;
```

### 🏷️ **Accéder à un contenu**

```php
(string) $xml->color[0]->price;
```

___

👨🏻‍💻 Manipulation

Afficher au foramt XML le résultat de lecture d'une entity.

___

## 📑 Modèles DOM et SAX

Plusieurs fonctions  analyse des fichiers xml et displose d'une **Simple Api for XML**. Il est possible contrairement au modèle DOM de spécifier des foncitons de rappel sur des évènements de la lecture.

### 🏷️ **DOM**

Php possède un **Document Model Object**.

[Document Model Object](https://www.php.net/manual/fr/class.domdocument.php)

* Construction

```php
$dom = new DOMDocument('1.0', 'UTF-8');
```

* Ajouter un enfant

```php
$element = $dom->createElement("product");
```

* Ajouter du contenu

```php
$text = $dom->createTextNode("Hello");
$element->appendChild($text);
$dom->appendChild($element);
```

* Ajouter un attribut

```php
$element->setAttribute("rate", 5);
```

* Accéder à un enfant

```php
$element = $dom->getElementsByTagName("product")[0]
```

* Accéder à un contenu

```php
$dom->saveXML($element);
```

___

👨🏻‍💻 Manipulation

Afficher au foramt XML le résultat de lecture d'une entity.

___

### 🏷️ **Parseurs XML**

[Analyseur syntaxique XML](https://www.php.net/manual/fr/book.xml.php)

___

## 📑 Création de fichiers XML

Les deux classes observées possèdent des méthodes pour écrire sur disque.

### 🏷️ **SAX**

```php
$xml->asXML($filename);
```

### 🏷️ **DOM**

```php
$dom->save($filename);
```

___

👨🏻‍💻 Manipulation

Sauvegarder un fichier XML avant de l'avoir affiché. Son contenu correspond au résultat de lecture d'une entity.