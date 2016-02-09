## Agnamstore build with Laravel PHP Framework

## Installation :
 - Installer les dépendances avec : composer install ou update
 - Copier .env.example en .env
 - Utiliser le script sql  database/crt_base.sql
 - Modifier .env pour qu'il utilise l'utilisateur et la database inscrit dans  database/crt_base.sql
 - Modifier httpd-vhosts.conf avec à l'aide de apache-vhost.txt présent dans la racine du projet
 - Modifier le nom de domaine dans le fichier host de windows C:\Windows\System32\drivers\etc\hosts
 - Lancer la commande  : php artisan migrate (à relancer en cas de pull et d'ajout de migration)

