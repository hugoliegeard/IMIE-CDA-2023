<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/user', name: 'admin_user_')]
class UserController extends AbstractController
{
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/', name: 'index')]
    public function index(UserRepository $ur): Response
    {
        $users = $ur->findAll();

        return $this->render('user/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[IsGranted('ROLE_MODERATEUR')]
    #[Route('/me', name: 'me')]
    public function me(): Response
    {
        //dd($this->getUser());

        return $this->render('user/me.html.twig', [
            'user' => $this->getUser(),
        ]);
    }

    #[IsGranted('ROLE_MODERATEUR')]
    #[Route('/edit', name: 'edit')]
    public function editUser(Request $request, ManagerRegistry $doctrine): Response
    {
        $user = $this->getUser();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $doctrine->getManager();
            $em->flush();
            $this->addFlash('success', 'Profil modifié !');
            return $this->redirectToRoute('admin_post_index');
        }

        return $this->render('user/edit.html.twig', [
            'formu' => $form->createView(),
        ]);
    }

    #[IsGranted('ROLE_ADMIN')]
    #[Route('/delete/{id}', name: 'delete')]
    public function delete(User $user, ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $em->remove($user);
        $em->flush();
        $this->addFlash('success', 'User supprimé !');
        return $this->redirectToRoute('admin_user_index');
    }

}
