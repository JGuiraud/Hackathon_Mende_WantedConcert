Wanted Concert - Concert In Camp
===================


Lorsqu'il s'agit d'événements artistiques musicaux, les grandes villes de France sont les mieux fournies. La volonté de Wanted Concert est de dynamiser l'économie locale et rurale au travers du projet Concert In Camp en mettant en relation le monde artistique et les propriétaires de terrains de manière étique et solidaire.

Le challenge de ce projet était de mettre ces deux mondes en relation de manière intuitive, sobre et ludique. La technologie de développement utilisée est Laravel, un framework PHP.

Afin de lancer le projet il est nécessaire de le forker. Dupliquer le fichier .env.example et le renommer en .env
Il sera nécessaire de configurer les accès à la base de donnée de votre choix avec votre login et mot de passe de bdd.

Lancer les commandes :

#### <i class="icon-code"></i> Composer

    $ composer install


#### <i class="icon-code"></i> Générer un clé unique

    $ php artisan key:generate

#### <i class="icon-code"></i> Lancer les Migrations

    $ php artisan migrate

#### <i class="icon-code"></i> Lancer les Seed

    $ php artisan db:seed

#### <i class="icon-code"></i> Lancer le serveur

    $ php artisan serve

