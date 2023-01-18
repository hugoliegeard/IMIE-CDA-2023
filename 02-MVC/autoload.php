<?php

/**
 * Permet de charger automatiquement les
 * contrôleurs de notre projet.
 */
spl_autoload_register(function ($class) {
    require_once "src/Controller/$class.php";
});