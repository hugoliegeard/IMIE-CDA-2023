<?php

namespace App\Security\Voter;

use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class CommentVoter extends Voter
{
    public const NEW = 'comment_new';
    public const EDIT = 'comment_edit';
    public const DELETE = 'comment_delete';

    public function __construct(private Security $security)
    {
    }

    protected function supports(string $attribute, mixed $subject): bool
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        //dd($subject);
        return in_array($attribute, [self::NEW, self::EDIT, self::DELETE])
            && $subject instanceof \App\Entity\Comment;
    }

    protected function voteOnAttribute(string $attribute, mixed $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        //dd($user);
        // if the user is anonymous, do not grant access
        if (!$user instanceof UserInterface) {
            return false;
        }
        
        $comment = $subject;

        // ... (check conditions and return true to grant permission) ...
        switch ($attribute) {
            case self::NEW:
                // logic to determine if the user can VIEW
                // return true or false
                return $this->security->isGranted('ROLE_USER');
                break;
            case self::EDIT:
                // logic to determine if the user can EDIT
                // return true or false
                return 
                    $this->security->isGranted('ROLE_ADMIN') 
                    or 
                    $comment->getAuthor() == $user;
                break;
            case self::DELETE:
                // logic to determine if the user can DELETE
                // return true or false
                return 
                    $this->security->isGranted('ROLE_ADMIN') 
                    or 
                    $comment->getAuthor() == $user;
                break;
            }

        return false;
    }
}
