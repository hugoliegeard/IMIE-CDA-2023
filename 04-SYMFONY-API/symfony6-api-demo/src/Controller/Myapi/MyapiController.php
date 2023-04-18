<?php
namespace App\Controller\Myapi;

use App\Entity\Post;
use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/myapi', name: 'my_api_')]
class MyapiController extends AbstractController
{
    #[Route('/posts', name: 'posts', methods: ['GET'])]
    public function index(PostRepository $pr): JsonResponse
    {
        $posts = $pr->findAll();
        phpinfo();
        dd($posts);
        return $this->json($posts, Response::HTTP_OK);
    }

    #[Route('/posts/{id}', name: 'post', methods: ['GET'])]
    public function show(Post $post): JsonResponse
    {
        return $this->json($post, Response::HTTP_OK);
    }
}