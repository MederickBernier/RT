# Documentation for the Project RT

---

i will provide you with all the documentation starting with server configuration, plugins and everything required like versions and others.

## Downloads

* [Wamp Server](https://wampserver.aviatechno.net/)
* [Git](https://git-scm.com/downloads)
* [Composer](https://getcomposer.org/download/)
* [Node](https://nodejs.org/en)
* [Visual Studio Code](https://code.visualstudio.com/)

---

## Installation des applications

ici tu peux installer tes différentes applications, commence toujours par Wamp vu que tu vas avoir besoin de son installation de php pour installer composer.

Donc une ordre d'installation pourrais être

* Wamp
* Composer
* Git
* Node
* Vs Code

J'ai fait cette liste en prenant en compte que tu avais aucun des logiciels nécessaires donc juste à être sur que tu les as.

pour vérifier les versions voici les commandes

|Application|Commande|
|-----|-----|
| Node | ``` node --version ``` |
| Npm | ``` npm --version ``` |
| Composer | ``` composer --version ``` |

Donc normalement tu vas vouloir avoir les versions

|Application|Version|
| ----- | ----- |
| Node | 20.10.0 |
| Npm | 10.2.3 |
| Composer | 2.6.5 |

Dans le cas de Wamp je vais te fournir les versions que j'utilise localement

| Server App | Version |
| ----- | ----- |
| Apache | 2.4.54 |
| PHP | 8.2.11 |
| MariaDB | 10 |

## Configurations Serveur

___DURANT CETTE PROCÉDURE SOIT SUR QUE TON SERVEUR NE ROULE PAS, ÇA ÉVITE DES ERREURS___

### Ajouter le host au host file de windows

Pour ajouter le virtual host (qu'on vas créer ensuite au host file de windows).

* Ouvrir Notepad en Administrateur
* Naviguer pour ouvrir le fichier "hosts" à cette localisation : C:\Windows\System32\drivers\etc
* Si tu ne vois pas le fichier soit sur que tu ne cherche pas uniquement les fichiers texte, car c'est un fichier sans extension
* Une fois le fichier ouvert tu vas à la fin du ficher et tu vas ajouter la ligne suivante
* 127.0.0.1 RT.local
* Faire cela va dire au DNS de windows que cet URL (<http://RT.local>) va aller sur le localhost loop
* Une fois que c'est sauvegardé, on peut fermer notepad on as terminé avec.

### Ajouter un Virtual Host avec Wamp

Pour ajouter le virtual host dans le dossier apache de wamp c'est un peu plus involved mais quand même straight forward.

* Pour commencer tu vas aller au dossier root de ton Wamp
* Ouvre le dossier "bin"
* Ouvre le dossier "Apache"
* Ouvre le dossier correspondant à la version d'apache que tu peux utiliser, on essayeras d'avoir les même versions si possible
* Dans ce dossier, il y as plusieurs dossier, mais le seul qui nous intéresse pour l'instant c'est "conf" donc on ouvre celui là
* Dans le dossier conf, il y as un autre dossier appelé "extra", c'est lui qu'on ouvre ensuite (je sais ca commence à faire des dossier, nested structure sorry)
* Finalement dans ce dossier on ouvre avec VSCode ou autre Éditeur le fichier appelé "httpd-vhost.conf"
* Dans ce ficher, il devrais avoir un exemple de code qu'il faut dupliquer et modifier, je vais te donner celui qu'on vas utiliser, tu auras juste à le rajouter à la fin du fichier
* Pour la commande "Directory" dans le code qui suit j'ai mis mon chemin, mais pour toi ca peut être différent en fonction de où tu as installé Wamp donc je dirais que pour faire simple c'est le chemin absolu du dossier "www" dans ton dossier "Wamp"

#### Code à ajouter à la fin du httpd-vhost.conf

```
<VirtualHost *:80>
    DocumentRoot "C:/wamp/www/RT/public/"
    ServerName RT.local
    <Directory "C:/wamp/www/RT/public/">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

* Une fois que tout est mis dans le host et dans le virtual host, tu peux starter ton serveur Wamp.

---

## Github cloning and base setup

Maintenant vu qu'on as installer Git on vas pouvoir cloner le repository dans ton dossier "www" qui est dans ton dossier "Wamp"

* [Lien du repository](https://github.com/MederickBernier/RT)
* Une fois sur la page, clique sur le bouton vert et copie le lien qui as dans la section Https, on vas en avoir besoin pour la suite.
* une fois que tu as le lien, tu vas ouvrir une command prompt et cd ton chemin dans ton dossier www de Wamp, je vais te fournir toutes les commandes que tu vas avoir besoin, mais c'est sur que ca va te prendre un compte github si tu en as pas un déja.

---

## Database Implementation

---
