<?php
namespace App\DataFixtures;

use Faker;
use App\Entity\Post;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class PostFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");

        $photos = [
            1 => [
                'name' => 'hossegor-ngor-senegal-chipiron-surfboards21770-6461f122bbf67416238441.jpg',
            ],
            2 => [
                'name' => 'img-3571-6461f0e257e5f928453241.jpg',
            ],
            3 => [
                'name' => 'traction-pad-francais-1-piece-traction-pad-3-pieces-ecologique-6461f1303315f747996235.jpg',
            ],
            4 => [
                'name' => 'banniere-6461ea3f6502d962198629.jpg',
            ],
        ];

        for($i = 1; $i <= 100; $i++) {
            $user = $this->getReference('user_' . $faker->numberBetween(2, 30));
            $category = $this->getReference('category_' . $faker->numberBetween(1, 23));

            $post = new Post();
            $datetimeCreated = DateTimeImmutable::createFromMutable($faker->dateTimeBetween("-3 year", "now"));

            $post->setUser($user)
                ->setCategory($category)
                ->setTitle($faker->realText(100))
                ->setContent($faker->realText(1500))
                ->setCreatedAt($datetimeCreated)
                ->setActive($faker->numberBetween(0,1));
            $post->setImageSize(1000);
            
            $post->setImageName($photos[$faker->numberBetween(1,4)]['name']);
            
            /*
            $urlUploadedImage = $faker->image('public/images/posts');
            //dd($urlUploadedImage);
            $imageName = str_replace('public/images/posts', '', $urlUploadedImage);
            $imageName = basename($urlUploadedImage);
            $post->setImageName($imageName);
            */

            $manager->persist($post);
            $this->addReference('post_' . $i, $post);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
            UserFixtures::class
        ];
    }
}