<?php

namespace App\Controller\Dashboard;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/admin', name: 'admin_home', methods: 'GET')]
    # https://localhost:8000/dashboard
    public function home()
    {
        return $this->render('layout.html.twig');
        //return $this->json(['username' => 'jane.doe']);
    }
}