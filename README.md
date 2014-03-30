# HackMe - Biblio

ATTENTION ! Cette application web est vuln�rable. Ne JAMAIS l'utiliser pour cr�er un site web.
Le but est de d�couvrir certaines failles web dans une situation r�aliste.


## Installation :

1. Copier tous les fichiers � la racine du serveur Apache
2. Donner un droit d'�criture dans le r�pertoire ``user/uploads/`` � l'utilisateur d'Apache
3. Activer le rewriting sur le serveur apache avec la commande ``a2enmod rewrite``
4. Cr�er la base de donn�es � partir de ``database_install.sql`` (via PhpMyAdmin par exemple)
5. Cr�er un utilisateur MySQL et lui donner un acc�s � la base de donn�es en __lecture uniquement__
6. Renseigner les identifiants SQL de cet utilisateur dans le fichier inc/config.php


## Objectifs :

- Ne pas tricher en regardant les sources
- Revenir sur le site en cas de bannissement
- Trouver une injection SQL
- Trouver une faille XSS et l'exploiter en envoyant un mail � l'admin
- Trouver une faille directory listing
- Trouver une faille directory traversal
- R�ussir � se connecter � l'interface d'administration du site

__Objectif ultime : ex�cuter du code PHP sur le serveur__
