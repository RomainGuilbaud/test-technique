# Rapport du rendu

## Installation
Je pars du principe que docker et docker-compose soit installé:
- Aller dans le repertoire my_project
- docker-compose up -d

Attention, je me suis rendu compte que la BDD n'était pas toujours UP lors du script entrypoint.sh, si la BDD n'est pas à jour (lancer le projet pour vérifier si tout est OK) faire ceci:
- docker exec -ti my_project_web_1 bash
- php bin/console doctrine:migrations:migrate
- php bin/console app:update-password-user (attention à ne pas l'exécuter plusieurs fois car elle peut crypter un mot de passe déjà crypter)

ensuite direction "http://127.0.0.1:8080/login" pour accéder à la page de login


## Explication de l'architecture
### back
Je suis parti sur le principe du clean architecture qui permet une meilleur evolution du projet,
des tests plus simple à implémenter, etc...

Pour cela nous avons les gateways, les useCases et les dto qui permettent de bien séparer le noyau du projet avec
l'externe (controller, bdd, view, api externe, etc...).

Bien sûr, je suis ouvert à d'autres design pattern, je sais m'adapter facilement à une autre architecture.

Pour tout ca, je suis parti sur du symfony 5.3 avec php 8. J'ai utilisé api-platform qui me permet de facilement faire
des requêtes API REST, il y a d'ailleurs tellement les requêtes POST, PUT, DELETE et autres sur les entités.

### front
Par le peu de temps que j'avais, je me suis tourné sur les outils directement intégré à Symfony. J'ai donc 
utilisé twig et jquery. Je me suis pas beaucoup focus sur le front. D'ailleurs, j'ai plus l'habitude de travaillé sur des frameworks js
(react.js ou vue.js), twig et jquery étant des technos que je n'ai pas utilisé depuis quelques années.

### migration du fichier xml
le script est dans le deuxiéme fichier de migration (Version20210826101150.php).
J'utilise aussi une commande pour encoder les mots de passe (un peu compliqué de les faire directement dans le fichier de migrations)

## Ce que j'aurais pu faire avec plus de temps
Étant donné que dans l'exercice, nous finissons avec des requêtes API REST, j'aurais fait deux projets, un API REST coté back et un autre
avec un framework JS (vue.js ou react) pour le front. Avec l'utilisation du bundle JWT pour la connexion via token.

## Le reste à faire (optionnel)
- faire un script pour attendre le démarrage de mysql pour le entrypoint
- Faire les tests unitaires
- rendre obligatoire l'authentification sur l'ensemble du projet (excepté la page login)
- la requête GET product/{sku}

# Test technique humansix

Le but de ce test est de mesurer le niveau technique du candidat et la façon de résoudre une problématique. Cela permet aussi de comprendre l'affinité d'un candidat avec le backend ou le frontend.

Le backend doit se faire via du php ou un CMS php de votre choix.

Le frontend peut se faire librement (html5, jquery, react, vuejs, template, ...).

Vous êtes libre dans le choix de la base de données.

Vous devrez indiquer comment installer votre projet (installation manuelle, docker, vagrant, etc).

## Step 1 - Mise en place d'une base

Vous devez analyser le xml orders.xml afin de créer les tables correspondantes, puis créer un script afin d'y injecter les données du xml.

## Step 2 - Mise en place d'un front

Vous devez créer une page de connexion avec comme utilisateur :

 - Login : admin
 - Pass : S3cr3T+

Une fois l'utilisateur connecté, vous devez afficher une page de résultats contenant les commandes qui sont en base de données.

Ces résultats doivent être triables au moins par date.

Il faut ensuite créer un formulaire pour créer une nouvelle commande avec les produits existants en base.

## Step 3 - Mise en place d'une micro API (optionnel)

Vous devez créer une micro API REST (en accès publique) qui permet de récupérer en GET les commandes et les produits.

La réponse doit être en JSON.

Exemples d'appels API souhaités :

 - http://localhost/api/orders : afficher toutes les commandes
 - http://localhost/api/order/{id} : afficher une commande en fonction de son id
 - http://localhost/api/products : afficher toutes les commandes
 - http://localhost/api/product/{sku} : afficher un produit en fonction de son sku
