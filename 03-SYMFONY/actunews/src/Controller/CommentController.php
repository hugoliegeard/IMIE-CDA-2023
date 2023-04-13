<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Repository\CommentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentController extends AbstractController
{

    #[IsGranted('ROLE_MODERATEUR')]
    #[Route('/admin/comment', name: 'admin_comment_index')]
    public function index(CommentRepository $cr): Response
    {
        $comments = $cr->findAll();

        return $this->render('comment/index.html.twig', [
            'comments' => $comments,
        ]);
    }

    #[IsGranted('ROLE_MODERATEUR')]
    #[Route('/admin/comment/delete/{id}', name: 'admin_comment_delete')]
    public function delete_admin(Comment $comment, ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();
        $em->remove($comment);
        $em->flush();
        $this->addFlash('success', 'Commentaire supprimée !');
        return $this->redirectToRoute('admin_comment_index');
    }

    #[IsGranted('ROLE_USER')]
    #[Route('/comment/delete/{id}', name: 'comment_delete')]
    public function delete(Comment $comment, ManagerRegistry $doctrine, Request $request): Response
    {
        if ($comment->getUser() == $this->getUser()) {
            $em = $doctrine->getManager();
            $em->remove($comment);
            $em->flush();
            $this->addFlash('success', 'Commentaire supprimée !');
        } else {
            $this->addFlash('danger', 'Action interdite !');
        }
        return $this->redirectToRoute('fiche', array('slug' => $comment->getPost()->getSlug()));
        //return $this->redirect($request->headers->get('referer'));
    }
}
