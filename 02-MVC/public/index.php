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

# Importation de nos controleurs ----
require_once '../src/Controller/DefaultController.php';
require_once '../src/Controller/UserController.php';
require_once '../src/Controller/AdminController.php';

# Instantiation des controleurs ----
$defaultCtrl = new DefaultController();
$userCtrl = new UserController();
$adminCtrl = new AdminController();

# Récupération des paramètres de l'URL ----
# /index.php?controller=default&action=home
# https://www.google.com/search?q=imie+paris
$controller = $_GET['controller'];
$action     = $_GET['action'];

# Gestion de nos routes ----
if ($controller === 'default' && $action === 'home') {
    // echo "<h1>PAGE ACCUEIL</h1>";
    $defaultCtrl->home();
}

if ($controller === 'default' && $action === 'services') {
    //echo "<h1>PAGE NOS SERVICES</h1>";
    $defaultCtrl->services();
}

if ($controller === 'default' && $action === 'contact') {
    //echo "<h1>PAGE CONTACT</h1>";
    $defaultCtrl->contact();
}

if ($controller === 'user' && $action === 'login') {
//    echo "<h1>PAGE CONNEXION</h1>";
    $userCtrl->login();
}

if ($controller === 'user' && $action === 'logout') {
//    echo "<h1>PAGE DECONNEXION</h1>";
    $userCtrl->logout();
}

if ($controller === 'user' && $action === 'register') {
//    echo "<h1>PAGE INSCRIPTION</h1>";
    $userCtrl->register();
}

if ($controller === 'admin' && $action === 'dashboard') {
//    echo "<h1>PAGE DASHBOARD ADMINISTRATEUR</h1>";
    $adminCtrl->dashboard();
}
