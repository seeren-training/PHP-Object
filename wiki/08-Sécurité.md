# Sécurité

*  🔖 **Configuration de PHP**
*  🔖 **OWASP**
*  🔖 **Safe mode**

___

## 📑 Configuration de PHP

### 🏷️ **Fichier php.ini**

Nous pouvons personnaliser le fichier `php.ini` pour restreindre quelques fonctionnalités.

* Disabled display errors

```bash
display_errors=Off
```

* Log errors

```bash
error_log=/var/log/httpd/error.log
```

* Disabled files

```bash
file_uploads=Off
```

* Disabled file url

```bash
allow_url_fopen=Off
allow_url_include=Off
```

* Disabled functions

```bash
disable_functions=exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source
```

## 📑 OWASP

Les vulnérabilités communes doivent être connues et fixées. Le compliance guide OAWSP doit être pasé en revue pour comprendre les vecteurs d'attaques, les risques liés et les dispositifs à mettre en palce pour s'en prémunire.

[OWASP](https://owasp.org/www-pdf-archive/OWASP_Top_10-2017_%28en%29.pdf.pdf)

___

👨🏻‍💻 Manipulation

Se prémunir de la faille `XSS` et `CSRF`

___

## 📑 [Safe mode](https://www.php.net/manual/fr/features.safe-mode.php)

Avertissement: Cette fonctionnalité est OBSOLÈTE à partir de PHP 5.3.0 et a été SUPPRIMÉE à partir de PHP 5.4.0.

[Safe mode](https://www.php.net/manual/fr/features.safe-mode.php)