<h3>Projet Symfony CHIARI-RENARD-SCHAEGIS-DEMAZIERE</h3>

<p>Pour récupérer le projet, dans votre dossier, faites : <br/><i><b>git init</b> <br/><b>git pull <link>https://github.com/schaegis5u/projet_ecommerce.git</link></b></i><br/><br/>Vous pouvez utiliser Docker et faire :<br/> <i><b>docker run --name mariadbtest -e MYSQL_ROOT_PASSWORD=<link>mypass</link> -p 3306:3306 -d docker.io/library/mariadb:10.3</b></i> pour créer une BDD Docker <br/><i><b>php bin/console doctrine:database:create</b></i> pour créer Amazoom <br/><i><b>php bin/console doctrine:schema:update --force</b></i> pour créer les tables <br/><br/>N'oubliez pas de faire : <br/><i><b>composer install</b> <br/><b>npm install --save-dev</b> <br/><b>npm run dev</b></i> <br/>pour récuperer les fichiers essentiels ! </p>

