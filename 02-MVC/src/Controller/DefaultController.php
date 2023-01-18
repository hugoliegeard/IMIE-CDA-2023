<?php

namespace App\Controller;

use App\Model\Service;
use Symfony\Component\HttpFoundation\Response;

class DefaultController
{
    /**
     * Page d'Accueil
     */
    public function home() {

        $service = new Service();
        $services = $service->findAll();
        dump($services);

        return new Response('<h1>ACCUEIL MVC</h1>');
    }

    /**
     * Page de services
     */
    public function services() {
        return new Response('<h1>SERVICE MVC</h1>');
    }

    /**
     * Page de contacts
     */
    public function contact() {
        return new Response('<h1>CONTACT MVC</h1>');
    }
}