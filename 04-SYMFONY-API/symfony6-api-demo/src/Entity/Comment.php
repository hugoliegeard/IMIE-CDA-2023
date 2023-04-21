<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Entity;

use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
//use ApiPlatform\Metadata\Post;
use Doctrine\DBAL\Types\Types;
use ApiPlatform\Metadata\Delete;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use function Symfony\Component\String\u;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Defines the properties of the Comment entity to represent the blog comments.
 * See https://symfony.com/doc/current/doctrine.html#creating-an-entity-class.
 *
 * Tip: if you have an existing database, you can generate these entity class automatically.
 * See https://symfony.com/doc/current/doctrine/reverse_engineering.html
 *
 * @author Ryan Weaver <weaverryan@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
#[ORM\Entity]
#[ORM\Table(name: 'symfony_demo_comment')]
/*
#[ApiResource]
#[Get]
#[\ApiPlatform\Metadata\Post(security: "is_granted('ROLE_USER')")]
#[Put(security: "is_granted('ROLE_ADMIN') or object.author == user")]
#[Delete(security: "is_granted('ROLE_ADMIN') or object.author == user")]
*/


/*
#[ApiResource(
    operations: [
        new Get(),
        new Put(
            security: "is_granted('ROLE_ADMIN') or object.author == user", 
            securityMessage: 'Utilisateur non propriétaire du commentaire ni admin !'
        ),
        new \ApiPlatform\Metadata\Post(
            security: "is_granted('ROLE_USER')", 
            securityMessage: 'Utilisateur non identifié !'
        ),
        new Delete(
            security: "is_granted('ROLE_ADMIN') or object.author == user", 
            securityMessage: 'Utilisateur non propriétaire du commentaire ni admin !'
        )
    ]
)]
*/

/*
#[ApiResource(
    operations: [
        new Get(),
        new \ApiPlatform\Metadata\Post(
            security: 'is_granted("comment_new", object)', 
            securityMessage: 'Utilisateur non identifié !'
        ),
        new Put(
            security: 'is_granted("comment_edit", object)', 
            securityMessage: 'Utilisateur non propriétaire du commentaire ni admin !'
        ),
        new Delete(
            security: 'is_granted("comment_delete", object)', 
            securityMessage: 'Utilisateur non propriétaire du commentaire ni admin !'
        )
    ]
)]
*/
#[ApiResource]
#[Get]
#[\ApiPlatform\Metadata\Post(securityPostDenormalize: "is_granted('comment_new', object)")]
#[Put(security: "is_granted('comment_edit', object)")]
#[Delete(security: "is_granted('comment_delete', object)")]
class Comment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER)]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: Post::class, inversedBy: 'comments')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Post $post = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: 'comment.blank')]
    #[Assert\Length(min: 5, minMessage: 'comment.too_short', max: 10000, maxMessage: 'comment.too_long')]
    #[Groups(['read:post:item'])]
    private ?string $content = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    #[Groups(['read:post:item'])]
    private \DateTime $publishedAt;

    #[ORM\ManyToOne(targetEntity: User::class)]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['read:post:item'])]
    public ?User $author = null;

    public function __construct()
    {
        $this->publishedAt = new \DateTime();
    }

    #[Assert\IsTrue(message: 'comment.is_spam')]
    public function isLegitComment(): bool
    {
        $containsInvalidCharacters = null !== u($this->content)->indexOf('@');

        return !$containsInvalidCharacters;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): void
    {
        $this->content = $content;
    }

    public function getPublishedAt(): \DateTime
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTime $publishedAt): void
    {
        $this->publishedAt = $publishedAt;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    public function getPost(): ?Post
    {
        return $this->post;
    }

    public function setPost(Post $post): void
    {
        $this->post = $post;
    }
}
