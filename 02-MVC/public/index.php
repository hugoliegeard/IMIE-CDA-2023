<ul>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/accueil.html">Accueil</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/default/services">Nos services</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/inscription.html">Inscription</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/connexion.html">Connexion</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/deconnexion.html">Déconnexion</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/contact.html">Contact</a></li>
    <li><a href="http://localhost/IMIE-CDA-2023/02-MVC/public/admin/dashboard.html">Administration</a></li>
</ul>

<?php

# Chargement de l'auto-loading
require_once '../autoload.php';

# Récupération des paramètres de l'URL
$controller = ucfirst($_GET['controller']) . 'Controller';
$action = $_GET['action'];

# Gestion automatique des routes
call_user_func_array([new $controller, $action], []);

// Approche Manuel
// $obj = new $controller(); // DefaultController, UserController, ...
// $obj->$action(); // -> home(), -> register(), ...

// Approche Dynamite
// $$controller = new $controller();
// ${$controller}->$action();
// print_r($DefaultController);