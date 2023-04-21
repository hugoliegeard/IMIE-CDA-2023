Symfony Blog Actunews
========================

Lors du clone, il faut :

- Installer les vendors : composer install

- Décommenter la ligne JWT_PASSPHRASE dans .env
ou encore mieux, mettre cette ligne dans .env.local

- Générer les clés publique et privée pour JWT (voir trame de cours)

- Vérifier le paramétrage de la BD dans le .env

- Créer la BD si elle n'existe pas dans votre serveur

- Exécuter les migrations pour générer le schéma physique
