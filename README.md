# projet_ecommerce
Projet Symfony CHIARI-RENARD-SCHAEGIS-DEMAZIERE

Pour récupérer le projet, dans votre dossier, faites "git init", "git pull https://github.com/schaegis5u/projet_ecommerce.git" pour récupérer les données.
Vous pouvez reprendre la BDD fournie, ou plus simplement : créez en une nouvelle nommée Amazoom (utiliser Adminer ou Laragon, par ex) et faites "php bin/console doctrine:schema:update --force".
N'oubliez pas de faire "composer install", "npm install --save-dev" et "npm run dev" pour récuperer les fichiers essentiels !

TODO : 
Lier à une base de données [FAIT] -
Réaliser les pages de création d'objets - [FAIT mais BASIQUE - AMELIORER] - 
Réaliser les pages lorsque l'on clique sur un objet (visualiser l'objet, pouvoir avoir des infos, l'acheter...) - [FAIT mais BASIQUE - AMELIORER] - 
Réaliser la gestion d'utilisateurs

Décoration des différentes pages pour donner un style, notamment page accueil, afficher les onjets en "grille" avec des photos & le nom de l'objet (+ prix ?)

? Réaliser une entitée Catégorie, liée à un objet (ManyToOne).
On ajouterait à l'avance de nombreuses catégories (réaliser /categories/new du coup) et on les afficherai dans un nav sur le côté sur l'accueil.
Cliquer sur une catégorie afficherait tout les objets possédant ladite catégorie.
? (Si on a le tps)

... D'autre ? TO BE ADDED
