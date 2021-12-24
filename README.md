<h3>Projet Symfony CHIARI-RENARD-SCHAEGIS-DEMAZIERE</h3>
<p>BDD disponible dans <i>BDD</i>. Pré-remplie, avec un utilisateur ADMIN : <b>Roger2</b> ; MDP : <b>azertyu</b><br/><p>Seul l'utilisateur ayant crée l'objet peut le modifier ou le supprimer ! Tout les objets de cette BDD sont crées depuis Roger2, il est donc nécessaire de l'utiliser pour ces modifications. Cela ne concerne <b>pas</b> la suppression de l'objet lorsqu'il est acheté par un utilisateur.
<p>Pour récupérer le projet, dans votre dossier, faites : <br/><i><b>git init</b> <br/><b>git pull <link>https://github.com/schaegis5u/projet_ecommerce.git</link></b></i><br/><br/>Vous pouvez utiliser Docker et faire :<br/> <i><b>docker run --name mariadbtest -e MYSQL_ROOT_PASSWORD=<link>mypass</link> -p 3306:3306 -d docker.io/library/mariadb:10.3</b></i> pour créer une BDD Docker <br/><i><b>php bin/console doctrine:database:create</b></i> pour créer Amazoom <br/><i><b>php bin/console doctrine:schema:update --force</b></i> pour créer les tables <br/><br/>N'oubliez pas de faire : <br/><i><b>composer install</b> <br/><b>npm install --save-dev</b> <br/><b>npm run dev</b></i> <br/>pour récuperer les fichiers essentiels ! </p><br/><p> Note : Pour voir les anciens changements, rendez-vous sur <b> <i> Pull requests.</i></b> Dans les requêtes fermées, vous retrouverez les différentes branches qui ont été supprimées (raison inconnue) et les commits effectués sur ces branches. En cliquant sur ces commits, vous verrez les changements qui y ont été effectués et qui les a effectués.</p>
