# Etude d'un ORM

*  🔖 **Installation**
*  🔖 **Configuration**
*  🔖 **Commande**
*  🔖 **Requêtes**

___

## 📑 [Installation](https://packagist.org/packages/doctrine/orm)

L'orm `doctrine` s'installe avec composer en ligne de commande.

```bash
composer require doctrine/orm
```

## 📑 [Les fichiers de configuration](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/getting-started.html#obtaining-the-entitymanager)

Un **fichier de configuration** est nécessaire pour créer notre manager de la couche modèle.

* config/bootstrap.php

```php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . "/../vendor/autoload.php";

$entityManager = EntityManager::create(
    [
        'driver'   => 'pdo_mysql',
        'user'     => 'root',
        'password' => '',
        'dbname'   => 'foo',
    ],
    Setup::createAnnotationMetadataConfiguration(['src/Entity',], false, null, null, false)
);
```

Il est important d'indiquer le cache à false en cinquième argument du Setup pour les manipulations suivantes

___

## 📑 [Le mode commande](https://www.doctrine-project.org/projects/doctrine-orm/en/2.7/tutorials/getting-started.html#generating-the-database-schema)

Doctrine possède un binary pour pouvoir exécuter des commandes. Pour l'utiliser il attend de trouver le fichier suivant:

* config/cli-config.php

```php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/bootstrap.php';

return ConsoleRunner::createHelperSet($entityManager);
```

Pour vérifier notre configuration de l'entity manager et du cli, discutons avec doctrine.

```bash
vendor/bin/doctrine
```

Maintenant l'ORM configuré et le mode commande activé, nous pouvons utiliser ses fonctionnalités.

___

👨🏻‍💻 Manipulation

Installer et configurer Doctrine.

___

### 🏷️ **Database First**

* Création des classes

Notre couche modèle peu être générée en ligne de commande à partir d'une base possédant des tables.

```bash
vendor/bin/doctrine orm:convert-mapping annotation src/Entity --from-database
```

Bien que la commande suivante soit dépréciée il est possible de générer les getters/setters. Préférez utiliser votre IDE.

* Générer les getters/setters

```bash
vendor/bin/doctrine orm:generate:entities src/Entity
```

___

👨🏻‍💻 Manipulation

Générer la couche modèle avec Doctrine.

___

### 🏷️ **Génération de la base**

Les tables de la base de donnée spécifiée dans le fichier de configuration peut être généré avec la commande suivante:

```bash
vendor/bin/doctrine orm:schema-tool:create
```

___

### 🏷️ **Les annotations**

Les annotations permettent à doctrine de renseigner des meta données sur la classe et ses attributs pour pouvoir la mapper sur la table qui la représente et ses colonnes.

### 🏷️ **Création des répertoires**

Pour la lecture, la bonne pratique est de **stocker la formulation des requêtes** dans la couche `Repository`.

* Annotation

La classe doit spécifier quel repository lui est rattaché.

```php
@ORM\Entity(repositoryClass="App\Repository\ProductRepository")
```

* Générer

```bash
vendor/bin/doctrine orm:generate:repositories src/Entity
```

___

👨🏻‍💻 Manipulation

Générer la couche répertoire.

___

### 🏷️ **Gestion des identifiants**

Les clefs primaires sont des valeurs générées et font parties de l'identité de la table. **Aucun setter ne devrait modifier une clef primaire**. En ce qui concerne les indexes unique il y a deux syntaxes possibles.

* Sur la table

```bash
@ORM\Table(name="product", uniqueConstraints={@ORM\UniqueConstraint(name="color", columns={"color"})})
```

* Sur les colonnes

```bash
@ORM\Column(name="color", type="string", length=64, unique=true)
```

___

## 📑 Génération des requêtes

### 🏷️ **Modifications**

Pour effectuer des modifications sur les données comme une insertion, mise à jour, suppression, **il faut utiliser le gestionnaire d'entitées**.

```php
require __DIR__ . '/bootstrap.php';
```

* Insertion

```php
$entityManager->persist($entity);
$entityManager->flush();
```

* Mise à jour

```php
$entityManager->flush();
```

* Suppression

```php
$entityManager->remove($entity);
$entityManager->flush();
```

### 🏷️ **Lecture**

Pour lire les données **il faut utiliser le repertoire associé à l'entity**.

```php
$repository = $entityManager->getRepository(Product::class);
```

* Plusieurs lignes

```php
$entities = $repository->findAll();
```

* Plusieurs lignes par critère

```php
$entities = $repository->findByColor("Rouge");
```

* Une ligne

```php
$entity = $repository->find($id);
```

* Une ligne  par critère

```php
$entity = $repository->findOneByColor("Rouge");
```

___

👨🏻‍💻 Manipulation

Utiliser l'entity manager et les repositories pour performer les actions sur la base de données

___