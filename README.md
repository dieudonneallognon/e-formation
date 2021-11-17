## Contexte

E-Formation est une plateforme de E-learning gérée par un administeur des
formateurs et ouverts au clients

Les clients peuvent voir les formations et les consulter

Les formateurs gèrent leur formation (ajout, suppression, création, demande de compte)

Les administrateurs eux gèrent toute la plateforme, ils ont les mêmes droits que
les utilisateurs, et formateurs, mais peuvent confirmer l'ajout ou non des
utilisateurs

## Installation du projet

-   Il est nécessaire d'avoir composer installé

-   Dupliquer le fichier .env.example en le rennommant en .env.example puis
    configurer la base de donnée grâce aux variables
    DB_CONNECTION
    DB_HOST
    DB_PORT
    DB_DATABASE
    DB_USERNAME
    DB_PASSWORD

-   Taper les commandes suivantes à la racine du projet

composer install

php artisan migrate:fresh --seed

## Lancement du projet

-   Taper la commande php artisan serve

## Se connecter en tant qu'administrateurs

email: admin@admin.com
mot de passe: admin

## MCD

Voir le fichier MCD.png
