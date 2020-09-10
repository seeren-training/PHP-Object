# Sécurité

*  🔖 **Configuration de PHP**
*  🔖 **OWASP**
*  🔖 **Safe mode**

___

## 📑 Configuration de PHP

### 🏷️ **Ini**

You can customize php.ini to restrict some features.

* Disabled display errors:

```bash
display_errors=Off
```

* Log errors:

```bash
error_log=/var/log/httpd/error.log
```

* Disabled files:

```bash
file_uploads=Off
```

* Disabled file url:

```bash
allow_url_fopen=Off
allow_url_include=Off
```

* Disabled functions:

```bash
disable_functions =exec,passthru,shell_exec,system,proc_open,popen,curl_exec,curl_multi_exec,parse_ini_file,show_source
```

## 📑 [OWASP](https://owasp.org/www-pdf-archive/OWASP_Top_10-2017_%28en%29.pdf.pdf)

**Les vulnérabilités communes doivent être connues et fixées**.

___

👨🏻‍💻 Manipulation

Se prémunire de la faille **XSS** et **CSRF**

___

## 📑 [Safe mode](https://www.php.net/manual/fr/features.safe-mode.php)

**Avertissement: Cette fonctionnalité est OBSOLÈTE à partir de PHP 5.3.0 et a été SUPPRIMÉE à partir de PHP 5.4.0.**
