# Bonnes pratiques de développement en PHP

*  🔖 **Débogage et profiling**
*  🔖 **Mise en cache et compression**
*  🔖 **Les solutions de codage à retenir**

___

## 📑 Débogage et profiling

Faire du pas à pas ou générer un rapport d'éxécution permet de mettre en avant les problèmes de conception et d'algoritmie.

### 🏷️ [**XDebug**](https://xdebug.org/)

* Installation:

Utiliser le wizard pour choisir la version à télécharger puis déplacer le fichier téléchargé dans **C:/serveur/php/ext/**.

* Activation:

```ini
zend_extension=php_xdebug-2.9.5-7.4-vc15-x86_64.dll
```

* Profiler:

```ini
xdebug.profiler_enable = 1
xdebug.profiler_output_dir = "tmp"
xdebug.profiler_output_name = "cachegrind.out.%R"
```

* Lecture:

Qcachegrind: https://sourceforge.net/projects/qcachegrindwin/files/latest/download

___

👨🏻‍💻 Manipulation

Générer un raport de profile et l'analyser.

___

## 📑 Mise en cache et compression

* [Compression.php](https://www.php.net/manual/fr/filters.compression.php)

* [Opcache.php](https://www.php.net/manual/fr/book.opcache.php)

* [PSR-6](https://www.php-fig.org/psr/psr-6/)

___

👨🏻‍💻 Manipulation

Installer opcache.

___

## 📑 Les solutions de codage à retenir

* [PRS-1/](https://www.php-fig.org/psr/psr-1/)

* [PSR-2/](https://www.php-fig.org/psr/psr-2/)