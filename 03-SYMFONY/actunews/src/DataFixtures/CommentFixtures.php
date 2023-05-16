<?php
namespace App\DataFixtures;

use Faker;
use DateTimeImmutable;
use App\Entity\Comment;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");

        // Générer des comments rattachés à des posts 
        for($i = 1; $i <= 100; $i++) {
            $user = $this->getReference('user_' . $faker->numberBetween(2, 30));
            $post = $this->getReference('post_' . $faker->numberBetween(1, 100));
            $comment = new Comment();
            $datetimeCreated = DateTimeImmutable::createFromMutable($faker->dateTimeBetween("-3 year", "now"));
            $comment->setContent($faker->realText(200))
                ->setContent($faker->realText(200))
                ->setCreatedAt($datetimeCreated)
                ->setPost($post)
                ->setUser($user);
            $manager->persist($comment);
        }
        
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            PostFixtures::class,
        ];
    }
}