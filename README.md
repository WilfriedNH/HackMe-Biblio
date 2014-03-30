# HackMe - Biblio

ATTENTION ! Cette application web est vulnérable. Ne JAMAIS l'utiliser pour créer un site web.
Le but est de découvrir certaines failles web dans une situation réaliste.


## Installation :

1. Copier tous les fichiers à la racine du serveur Apache
2. Donner un droit d'écriture dans le répertoire ``user/uploads/`` à l'utilisateur d'Apache
3. Activer le rewriting sur le serveur apache avec la commande ``a2enmod rewrite``
4. Créer la base de données à partir de ``database_install.sql`` (via PhpMyAdmin par exemple)
5. Créer un utilisateur MySQL et lui donner un accès à la base de données en __lecture uniquement__
6. Renseigner les identifiants SQL de cet utilisateur dans le fichier inc/config.php


## Objectifs :

- Ne pas tricher en regardant les sources
- Revenir sur le site en cas de bannissement
- Trouver une injection SQL
- Trouver une faille XSS et l'exploiter en envoyant un mail à l'admin
- Trouver une faille directory listing
- Trouver une faille directory traversal
- Réussir à se connecter à l'interface d'administration du site

__Objectif ultime : exécuter du code PHP sur le serveur__
