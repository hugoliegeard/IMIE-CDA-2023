<?php
namespace App\EventSubscriber;

use App\Entity\User;
use Doctrine\ORM\Events;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;

class UserSubscriber implements EventSubscriberInterface
{

    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function getSubscribedEvents(): array
    {
        
        return [
            // On défini le ou les événements sur lesquels on veut s'accrocher
            Events::prePersist
        ];
        
        /*return [
            'prePersist' => 'onPrePersist',
        ];
        */

    }

    // On défini la méthode prévue pour le code à exécuter
    public function prePersist(LifecycleEventArgs $args): void
    {
        // On récupère l'objet qui doit être persisté
        $entity = $args->getObject();

        // Si l'intance concernée est de type User
        if ($entity instanceof User && strlen($entity->getPassword()) < 50) {
            // On procède au hashage du password envoyé en clair
            $entity->setPassword(
                $this->passwordHasher->hashPassword(
                    $entity,
                    $entity->getPassword()
                )
            );
        }

    }
}