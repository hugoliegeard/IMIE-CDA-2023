<?php

namespace App\Controller\Dashboard;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    #[IsGranted('ROLE_MODERATEUR')]
    #[Route('/admin', name: 'admin_home', methods: 'GET')]
    # https://localhost:8000/dashboard
    public function home()
    {
        return $this->render('layout.html.twig');
        //return $this->json(['username' => 'jane.doe']);
    }
}