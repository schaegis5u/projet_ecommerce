<h3>Projet Symfony CHIARI-RENARD-SCHAEGIS-DEMAZIERE</h3>

<p>Pour récupérer le projet, dans votre dossier, faites : <br/><b>git init</b> <br/><b>git pull <link>https://github.com/schaegis5u/projet_ecommerce.git</link></b><br/><br/>Vous pouvez utiliser Docker et faire :<br/> <b>docker run --name mariadbtest -e MYSQL_ROOT_PASSWORD=<link>mypass</link> -p 3306:3306 -d docker.io/library/mariadb:10.3</b> pour créer une BDD Docker <br/><b>php bin/console doctrine:database:create</b> pour créer Amazoom <br/><b>php bin/console doctrine:schema:update --force</b> pour créer les tables <br/><br/>N'oubliez pas de faire : <br/><b>composer install</b> <br/><b>npm install --save-dev</b> <br/><b>npm run dev</b> <br/>pour récuperer les fichiers essentiels ! </p>

TODO : Lier à une base de données [FAIT] - Réaliser les pages de création d'objets - [FAIT mais BASIQUE - AMELIORER] - Réaliser les pages lorsque l'on clique sur un objet (visualiser l'objet, pouvoir avoir des infos, l'acheter...) - [FAIT mais BASIQUE - AMELIORER] - Réaliser la gestion d'utilisateurs

Décoration des différentes pages pour donner un style, notamment page accueil, afficher les onjets en "grille" avec des photos & le nom de l'objet (+ prix ?)

? Réaliser une entitée Catégorie, liée à un objet (ManyToOne). On ajouterait à l'avance de nombreuses catégories (réaliser /categories/new du coup) et on les afficherai dans un nav sur le côté sur l'accueil. Cliquer sur une catégorie afficherait tout les objets possédant ladite catégorie. ? (Si on a le tps)

... D'autre ? TO BE ADDED
