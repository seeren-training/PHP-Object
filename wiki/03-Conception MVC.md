# Conception MVC

*  🔖 **Séparation**
*  🔖 **Model**
*  🔖 **Controller**
*  🔖 **View**
*  🔖 **Force**

___

## 📑 Séparation des attributions entre scripts

Les attributions ou `responsabilités` sont indispensables pour correctement séparer, `découpler nos classes` afin de pouvoir les réutiliser et écrire un code spécialisé

___

## 📑 [La couche modèle et données](https://fr.wikipedia.org/wiki/Architecture_trois_tiers#Couche_d'acc%C3%A8s_aux_donn%C3%A9es_(troisi%C3%A8me_niveau))

La donnée correspond aux **informations dynamiques étant sujet à une manipulation sur un espace de stockage ou à un formatage visuel**. Sa responsabilité est uniquement de se représenter, de proposer une structure d'information. Par convention cette couche réside dans le dossier `Model` ou `Entity`.

* Exemple:

```php
class Product
{

    private $color;

    public function getColor()
    {
        return $this->color;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

}
```

___


👨🏻‍💻 Manipulation

Identifier et mettre en place la couche modèle dans notre système

___

## 📑 [Le rôle du contrôleur](https://fr.wikipedia.org/wiki/Architecture_trois_tiers#Couche_de_traitement_(deuxi%C3%A8me_niveau))

**Le controller à la responsabilité de fournir une réponse** à un client qui formule une requête, il associe la couche modèle à la couche vue pour se faire. Une méthode d'un controller est appellée action, elle est `associé à une ou plusieurs url` par le procédé de routage. Par convention cette couche réside dans le dossier `Controller`.

* Exemple:

```php
class ProductController
{

    public function show()
    {
        $product = new Product();
        $product->setColor("Red");
        include "color.html.php";
    }

}
```

___

👨🏻‍💻 Manipulation

Identifier et mettre en place la couche controller dans notre système.

___

## 📑 [Le rôle des vues](https://fr.wikipedia.org/wiki/Architecture_trois_tiers#Couche_de_pr%C3%A9sentation_(premier_niveau))

**La vue est choisie par le controller et a la responsabilité de formater la couche modèle**. Pour une page web il s'agit de `fichiers html utilisant l'extension php` pour être dynamique, par convention cette couche réside dans le dossier `views` ou `templates` à la racine du projet.

* Exemple:

```html
<h1>Product</h1>
<ul>
    <li>
    Color: <?= $product->getColor() ?>
    </li>
</ul>
```

___

👨🏻‍💻 Manipulation

Identifier et mettre en place la couche vue dans notre système.

___

## 📑 [Force de l'objet dans la modèle MVC](https://fr.wikipedia.org/wiki/Mod%C3%A8le-vue-contr%C3%B4leur)

`Les responsabilités étant affinées chaque élément peut être réutilisé`. Afin de pouvoir fournir la réponse appropriée à une requête et mettre en place le pattern composite MVC le principe de routage doit exister via l'association entre une url et une action.

___

👨🏻‍💻 Manipulation

Associer une url à une action afin de construire le controller et d'invoquer son action en rapport avec la route qui correspond à la requête de l'utilisateur, prévoir les 404 et exceptions non attrapées pour afficher une page d'erreur interne.

___