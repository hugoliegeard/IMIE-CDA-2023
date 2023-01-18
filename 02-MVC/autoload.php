<?php

/**
 * Permet de charger automatiquement les
 * contrôleurs de notre projet.
 */
spl_autoload_register(function ($class) {
    $class = str_replace('App', 'src', $class);
    // echo "Tentative de chargement de : $class <br>";
    require_once str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
});