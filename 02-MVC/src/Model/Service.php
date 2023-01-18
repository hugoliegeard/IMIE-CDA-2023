<?php

namespace App\Model;

class Service
{
    /**
     * Imagine que cette fonction retourne
     * les services d'une BDD/API...
     */
    public function findAll()
    {
        return [
            'Création de Site Internet',
            'Création d\'Application Mobile',
            'Création de Logo',
            'Montage Vidéo',
            'Mixage Audio',
        ];
    }
}