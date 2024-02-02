# Local Startup web application using PHP, Bootstrap, Jquery and MySQL

## Installation guide:

Pour installer notre projet il est nécessaire d'avoir NodeJS et NPM installés sur votre
ordinateur. Vous pouvez télécharger ces deux logiciels gratuitement à cette adresse : https://nodejs.org/.


## Pour compiler et exécuter le projet:
Voici les étapes à suivre pour compiler et lancer le projet locallement:
1. Cloner le répertoire git sur votre ordinateur via Git Bash / Terminal bash sh,

2. git clone https://github.com/tounkaradiagui/Doumbia_Electronic_Services
3. Ouvrir le dossier "Doumbia_Electronic_Services" contenant tous les fichiers nécessaires au projet.
Pour compiler le code PHP :

Ouvrez un terminal et naviguez jusqu'à la racine du projet. Exécute le script php build.sh qui compile le code PHP en utilisant Docker. Ce script crée un conteneur Docker qui installe PHP.

Via WampServer ou Xampp :
- Installer Wampserver ou Xampp
- Lancer le serveur Apache & Mysql
- Copier le contenu du dossier "php" vers le dossier "htdocs" de Wampserver ou Xampp
- Configurer le fichier ".env" en remplaçant DB_DATABASE par DB_DATABASE=db_doumbiatest
- Accéder à http://localhost/Doumbia_Electronic_Services

Via Docker :
- Installez Docker
- Copiez le contenu du dossier "docker" dans le dossier docker de Windows\System32\drivers\etc\hosts et ajoutez cette ligne `1localhost`
- Copiez le contenu du dossier "docker" dans le dossier où se trouvent vos autres projets docker
- Exécutez la commande "docker-compose up --build" depuis le terminal (attention aux droits d'exécution)
- Accédez à http://localhost:8080

Pour visualiser le site avec Tailwind CSS :
- Installez NodeJS & Npm
- Ouvrez un nouveau terminal et naviguez jusqu’au dossier "css"
- Exécutez la commande npm install
- Retournez au premier terminal et copiez le contenu du dossier "public"
- Collez ce contenu dans le dossier "public" de l’application php

Le projet est désormais compilé et fonctionnel localement.

## Pour contribuer au projet :
Tout contributeur doit respecter le Code de conduite de GitHub.
Il est recommandé de faire des Pull Requests plutôt que de fusionner directement les modifications dans la branche master. Cela permet de garder une trace de toutes les contributions et facilite la collaboration entre les développeurs.

## Recommandation
Il est recommandé de créer des branches pour chaque modification afin de faciliter la gestion des contributions. Les modifications doivent être soumises sous forme de Pull Requests. Une fois que vous avez effectué vos modifications, il convient de faire une description claire et concise de ce qui a été ajouté ou modifié.
Assurez également de mentionner tout bug corrigé ou nouvelle feature implémentée.
Merci de votre contribution !

### Remarque

Si vous rencontrez des problèmes d'affichage, assurez-vous que votre système d'exploitation prend en charge ces technologies. Nous avons testé ce projet sur Windows 10 et Ubuntu 20.0.

En utilisant ce projet, vous acceptez ces conditions d'utilisation. En cas de litige concernant cette licence, n'hésitez pas à me contacter pour obtenir une version modifiée.

## Projet Realisé par :
**Diagui Tounkara** : Responsable pour le développement backend et frontend