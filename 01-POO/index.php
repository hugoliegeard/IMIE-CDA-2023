<?php

# Importation de nos classes
//require_once 'Models/Ecole.php';
//require_once 'Models/Classe.php';
//require_once 'Models/Eleve.php';
//require_once 'Models/Academie.php';

/**
 * spl_autoload_register, est une fonction permettant de
 * faire de l'autoloading. Elle est appelée automatiquement
 * par PHP dès qu'on instancie une classe qui n'a pas été inclus.
 */
spl_autoload_register(function($class) {
    echo 'Chargement de la classe : ' . $class . '<br>';
    require_once 'Models/' . $class . '.php';
});

/**
 * Création d'une instance de classe Ecole.
 * Ici, notre variable $ecole est un objet de
 * la classe Ecole.
 * ---------------------------------------
 * Mon objet à accès à l'ensemble des
 * propriétés et méthodes de ma classe.
 */
//$ecole = new Ecole();
//$ecole2 = new Ecole();

# Affecter des valeurs à notre objet
//$ecole->nom = 'IMIE Paris';
//$ecole->directeur = 'Boris Boczkowski';
//$ecole->adresse = '70 Rue Anatole France, 92300 Levallois-Perret';
//$ecole->capacite = 300;
//
//$ecole2->nom = 'IFCV';
//$ecole2->directeur = 'Hugo LIEGEARD';
//$ecole2->adresse = '70 Rue Anatole France, 92300 Levallois-Perret';
//$ecole2->capacite = 700;

// echo '<h1>'.$ecole->nom.'</h1>';
//echo "<h1>$ecole->nom</h1>";

// -- Exemple avec un constructeur
$ecole = new Ecole(
    'IMIE',
    '70 Rue Anatole France, 92300 Levallois-Perret',
    300,
    'Boris Boczkowski'
);

echo "<h1>{$ecole->getNomComplet()}</h1>";
echo "<h3>{$ecole->getDirecteur()}</h3>";

echo '<pre>';
print_r( $ecole );
echo '</pre>';

# Je veux changer le nom de l'école
$ecole->setNom('IMIE Paris');

echo "<h1>{$ecole->getNomComplet()}</h1>";
// echo "<h1>{$ecole->getNomAcademie()}</h1>";

/* --

    CONSIGNE : En vous appuyant sur notre travail avec la   classe Ecole,
    créez maintenant les classes : "Classe", "Eleve" et "Academie",
    dans des fichiers séparés : Classe.php, Eleve.php & Academie.php.
    Constructeur, Getters & Setters

-- */

// Création des élèves
$eleve1 = new Eleve('CARNEIRO', 'Alvin', 21);
$eleve2 = new Eleve('DERAY', 'Lucas', 31);
$eleve3 = new Eleve('SAULE', 'Fabien', 30);
$eleve4 = new Eleve('FOKOU MABAH', 'Urielle', 20);

// Création des classes
$classe1 = new Classe('Front', 'Imed', 19);
$classe2 = new Classe('Back', 'Philippe', 19);
$classe3 = new Classe('Fullstack', 'Hugo', 19);

# Problématique
# Comment affecter chaque élève dans une classe ?
$classe1->ajouterUnEleve($eleve1);
$classe2->ajouterUnEleve($eleve1);
$classe3->ajouterUnEleve($eleve1);
$classe1->ajouterUnEleve($eleve2);
$classe2->ajouterUnEleve($eleve3);
$classe1->ajouterUnEleve($eleve4);

# Affecter nos classes à une école
$ecole->ajouterUneClasse($classe1);
$ecole->ajouterUneClasse($classe2);
$ecole->ajouterUneClasse($classe3);

echo '<pre>';
print_r( $ecole );
echo '</pre>';

/*
 *  CONSIGNE : En partant de l'objet $ecole ; affichez la liste
 * ol, ul, li des classes et pour chaque classe les élèves.
 */

# Récupération des classes
$classes = $ecole->getClasses();

# On parcourt nos classes
echo '<ol>';

/** @var Classe $classe */
foreach ($classes as $classe) {

    # Afficher le nom de la classe
    echo '<li>';
    echo $classe->getNom();
    echo '</li>';

    # Afficher la liste des élèves
    echo '<ul>';

    # Je récupère les élèves de la "classe".
    $eleves = $classe->getEleves();

    /** @var Eleve $eleve */
    foreach ($eleves as $eleve) {

        echo '<li>';
        echo $eleve->getPrenom();
        echo '</li>';

    }

    echo '</ul>';
}

echo '</ol>';