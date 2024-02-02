# Votre projet devrait être organisé comme suit :

1. [x] Créer un tableau de bord pour l'administrateur pour la gestion des clients et services
    ce tableau de bord permettra :
    - d'ajouter/supprimer/modifier les informations des clients (nom, prenom, adresse mail)
    - afficher une liste des services proposés par le site (catégorie, nom du serviceprix)
    - ajouter ou supprimer des catégories de services
2. [x] Intégrer une fonctionalité de gestion des roles des utilisateurs
Les différents rôles sont :
    - Administrator : accès total à tout le système, peut modifier toutes les données
    - Manager : peut ajouter / supprimer des clients, mais pas modifier les informations des clients ni ajouter / supprimer des catégories de services
    - User : peut consulter les informations des clients ainsi que les offres de services disponibles mais ne peut pas modifier ces informations ni ajouter / supprimer des clients ou des services.
3. [x] Utiliser au moins 2 technologies différentes dans votre projet (PHP, Tailwind CSS, JQuery, etc.)

4. [x] Rendre votre interface graphique responsive en utilisant Bootstrap ou un framework similaire.
    Vous pouvez utiliser un thème pré-conçu si vous le souhaitez.
5. [x] La base de données doit être gérée via SQL (MySQL ou PostGreSql…). Vous pouvez utiliser Eloquent ORM si vous travaillez avec Laravel, ou MySqli sinon.

6. [x] Implémenter une connexion sécurisée à votre base de données MySQL. Pour cela, vous pouvez utiliser PHP avec PDO ou MySQLi. Asssurez-vous que vos mots de passe ne soient pas stockés en clair dans votre code source.

7. [x] Gérer correctement les erreurs et les exceptions qui peuvent se produire dans votre code. Pour cela, il est recommandé d’utiliser des try / catch mais pas obligatoire pour capturer les exceptions et de définir des messages d’erreur clairs et descriptifs.

8. [x] La page d'accueil doit afficher une image en fond avec une description

9. [x] Les formulaires doivent être validés avant envoi (utilisation d'un framework JS comme jQuery Validation ou similar).

10. [x] Écrire des commentaires explicites sur votre code pour faciliter la lecture et la maintenance de celui-ci. Les commentaires doivent être écrits en anglais et ne doit pas contenir plus de 70 caractères maximum par ligne.

11. [x] Choisissez un format de fichier pour votre projet (.zip ou .tar.gz).

12. [x] Permettre à l'administrateur et Manager de gérer les réparations et matériels
La section "Réparation" du tableau de bord devrait permettre aux administrateurs et managers de faire les opérations suivantes :
- Afficher une liste des équipements nécessitant une réparation
- Ajouter un équipement qui a besoin d’être réparé
- Supprimer un équipement qui n’a plus besoin de réparation
- Modifier les détails d’un équipement qui a déjà été réparé

13. [x] Intégrer une fonctionalité permettant de gérer les réseaux de Doumbia Electronic (vivement recommandé)

14.  Les formulaires doivent être validés avant d'être envoyés. Assurez-vous que vos contrôles sont suffisamment robust
et qu'ils ne peuvent pas être contournés par un simple clic sur "Envoyer".

15. [x] La sécurité de nos s est une priorité absolue
Utilisez des méthodes de cryptage appropriées pour protéger les données sensibles telles que les mots de passe.

16. [x] Utilisez des méthodes de vérification pour  eviter les attaques par injection SQL
telles que :
- Les contrôles de saisie (inputs) doivent être vides avant leur rem plessage
- Les valeurs entrées doivent correspondre à un type de donnée spécifique (exemple : une adresse e-mail doit contenir @ et .)
- Les mots de passe doivent comporter au minimum 8 caractères, incluent des lettres majuscules et minuscules, des chiffres et des symboles spécials
- Les données entrées dans le système sont traitées correctement pour éviter tout type d
d'injection SQL
- Les requêtes SQL utilisent des paramètres plutôt que des valeurs directement incorporées
dans la chaîne de requête sql

## Injection SQL
Injection SQL peut se produire si des parties de la chaîne de requête SQL sont construtes en utilisant des données dynamiques provenant du contexte d'exécution de l'application. Cela peut entraîner une faille d'injection SQL, où un
utilisateur mal intentionné peut injecter une partie de la chaîne de requête SQL, modifiant ainsi le résultat attendu de la requête. Pour prévenir cela, il est nécessaire d'utiliser des paramètres pour toutes les parties de la chaîne de
requête SQL qui dépendent des données fournies par l'utilisateur ou à l'extérieur de l'application.

Les paramètres sont des espaces réservés dans la chaîne de requête SQL qui sont remplacés par des valeurs fournies lors
de l'exécution de la requête. Cela permet de garantir que les parties de la chaîne de requête SQL proviennent uniquement des données fiables et non des données externes au contexte d'exécution de l'application.

17. [x] Le code source de votre application doit respecter les normes de codage suivantes :
- Le code doit etre commenté en anglais
- Le code doit être commenté clairement et facilement compris
- Le nommage des variables, des fonctions et des classes doit être descriptif
- L'indentation du code doit être cohérente et utiliser des espaces ou des tabulations pour indenter les blocs de code
- Le code doit être organisé de manière logique et facile à lire
- Il est interdit d'utiliser des mots clés réservés par les langages
- Le code doit être conforme aux standards CSS/HTML
- Les variables doivent être définies explicitement et leur usage doit être documenté
- L'utilisation de variables globales doit être minimisée
- Les fonctions doivent avoir un rôle unique et devraient être organisées logiquement
- Il y aura des tests unitaires pour chaque fonctionnalité

17. [x] Lorsque vous soumettez votre projet, veuillez inclure la documentation suivante
- Un README.md décrivant brièvement ce que fait votre application
- Une doc/index.html expliquant les fonctionnalités principales de votre application
- Des documents HTML pour chacune des pages de votre application

## Pour compléter le projet, vous pouvez également ajouter les éléments suivantes
1. Les commentaires sur chaque article publié
2. Les avis des clients sur les produits vendus
3. Un forum où les clients peuvent poser des questions ou partager leur expérience
4. Des newsletter pour informer les abonnés des nouveautés et offres spécial
5. Une section FAQ pour répondre aux questions fréquemment posées par les clients
6. Des galeries photos pour montrer nos réalisations


## Bonus
- [ ] Implémenter une fonctionnalité de notification pour informer les utilisateurs que
leur équipement est en attente de réparation ou qu’il a été réparé
- [ ] Créer un espace client pour chaque client où il peut consulter ses
commandes, ses équipements et ses notifications