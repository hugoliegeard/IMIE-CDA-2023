<?php

namespace App\Controller;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController ABCD',
            'controller_test' => 'Valeur 2',
            'controller_test2' => 'Valeur 3',
            'post' => [
                'title' => 'Le titre',
                'content' => 'Le super contenu'
            ],
        ]);
    }

    #[Route('/liste', name: 'liste')]
    public function liste(PostRepository $postRepository): Response
    {
        //$posts = $postRepository->findAll();
        $posts = $postRepository->findLastPosts();
        //dd($posts);

        $oldPosts = $postRepository->findOldPosts(1);
        //dd($oldPosts);

        return $this->render('test/liste.html.twig', [
            'posts' => $posts,  
            'oldPosts' => $oldPosts,
        ]);
    }

    //#[Route('/fiche/{id}', name: 'fiche', methods: ["GET"], requirements: ['id' => '\d+'])]
    #[Route('/fiche/{slug}', name: 'fiche', methods: ["GET"])]
    public function fiche(Post $post): Response
    {
        //dd($post);

        return $this->render('test/fiche.html.twig', [
            'post' => $post,
        ]);
    }

}
