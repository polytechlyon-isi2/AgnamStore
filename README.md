# Agnamstore build with Laravel PHP Framework

Projet réalisé à [Polytech Lyon](http://polytech.univ-lyon1.fr/) en cour **ISI2** avec le Professeur [Batiste Pesquet](http://bpesquet.fr/).  
**Sujet :** Site d'E-commerce basé sur le framework Laravel.  
**Théme :** Culture japonaise(Manga, Animé, Film d'animation, Light Novel).  

## Installation :
 - Installer les dépendances avec : **composer install** ou **update**
 - Copier **.env.example** en **.env**
 - Lancer la commande **php artisan key:generate** Pour générer une APP_KEY
 - Utiliser le script sql  **database/crt_base.sql**
 - Modifier .env pour qu'il utilise l'utilisateur et la database inscrits dans  database/crt_base.sql
 - Modifier **httpd-vhosts.conf** avec à l'aide de apache-vhost.txt présent dans la racine du projet
 - Modifier le nom de domaine dans le fichier host de windows C:\Windows\System32\drivers\etc\hosts
 - Lancer la commande  : **php artisan migrate** (à relancer en cas de pull et d'ajout de migration)
