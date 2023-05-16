Symfony Blog Actunews
========================

Lors du clone, il faut :

- Installer les vendors : composer install

- Décommenter la ligne JWT_PASSPHRASE dans .env
ou encore mieux, mettre cette ligne dans .env.local

- Générer les clés publique et privée pour JWT (voir trame de cours)

- Vérifier le paramétrage du mailer dans le .env :
MAILER_DSN=smtp://localhost:1025

- Vérifier le paramétrage de la BD dans le .env

- Créer la BD si elle n'existe pas dans votre serveur

- Exécuter les migrations pour générer le schéma physique

- Renseigner les clés pour Recaptcha v3 dans .env.local

- Pour générer les fixtures, à cause des foreign keys, il faut faire :
    php bin/console doctrine:schema:drop --force
    php bin/console doctrine:schema:update --force
    php bin/console doctrine:fixtures:load

