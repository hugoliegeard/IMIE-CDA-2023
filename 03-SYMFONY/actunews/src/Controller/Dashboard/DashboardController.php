<?php

namespace App\Controller\Dashboard;

use App\Repository\PostRepository;
use App\Repository\UserRepository;
use App\Repository\CommentRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class DashboardController extends AbstractController
{
    #[IsGranted('ROLE_MODERATEUR')]
    #[Route('/admin', name: 'admin_home', methods: 'GET')]
    # https://localhost:8000/admin
    public function home(
        PostRepository $postRepository,
        CommentRepository $commentRepository
        //UserRepository $userRepository,
        //CategoryRepository $categoryRepository
        )
    {
        //$nbPosts = $postRepository->nbPosts();
        //$nbUsers = $userRepository->nbUsers();
        //$nbCategories = $categoryRepository->nbCategories();
        //$nbComments = $commentRepository->nbComments();
        
        $comments = $commentRepository->findBy([], ['createdAt' => 'DESC'], 3);

        $counts = $postRepository->nbAllSubjects();
        //dd($counts);

        //dd($nbPosts);
        return $this->render('dashboard/dashboard.html.twig', [
            'nbPosts' => $counts[0]['nbposts'],
            'nbUsers' => $counts[0]['nbusers'],
            'nbCategories' => $counts[0]['nbcategories'],
            'nbComments' => $counts[0]['nbcomments'],
            'comments' => $comments,
        ]);
        //return $this->json(['username' => 'jane.doe']);
    }
}