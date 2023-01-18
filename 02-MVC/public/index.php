<ul>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/accueil.html">Accueil</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/default/services">Nos services</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/inscription.html">Inscription</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/connexion.html">Connexion</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/deconnexion.html">Déconnexion</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/contact.html">Contact</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/admin/dashboard">Administration</a></li>
</ul>

<?php

# Chargement de l'auto-loading de composer
use Symfony\Component\HttpFoundation\Response;

require_once '../vendor/autoload.php';

# Arrivée de la requête de l'utilisateur
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

# Récupération des paramètres de l'URL
$controller = 'App\\Controller\\' . ucfirst($request->query->get('controller')) . 'Controller';
$action = $request->query->get('action');

# Gestion automatique des routes
/** @var Response $response */
$response = call_user_func_array([new $controller, $action], []);

# Retour de la réponse à l'utilisateur
$response->send();