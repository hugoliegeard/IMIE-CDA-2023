<?php

namespace App\Controller;

use App\Model\Service;

class DefaultController
{
    /**
     * Page d'Accueil
     */
    public function home() {

        $service = new Service();
        $services = $service->findAll();
        print_r($services);

        echo "<h1>PAGE ACCUEIL | CONTROLLER</h1>";
    }

    /**
     * Page de services
     */
    public function services() {
        echo "<h1>PAGE SERVICE | CONTROLLER</h1>";
    }

    /**
     * Page de contacts
     */
    public function contact() {
        echo "<h1>PAGE CONTACT | CONTROLLER</h1>";
    }
}