<?php
namespace App\DataFixtures;

use Faker;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");

        $categories = [
            1 => [
                'name' => 'Longboard',
            ],
            2 => [
                'name' => 'Shortboard',
            ],
            3 => [
                'name' => 'Bodyboard',
            ],
        ];
        foreach($categories as $key => $value) {
            $category = new Category();
            $category->setName($value['name']);
            $manager->persist($category);

            $this->addReference('category_' . $key, $category);
        }

        for($i = 4; $i <= 23; $i++) {
            $category = new Category();
            $parent = $this->getReference('category_' . $faker->numberBetween(1, 3));
            $category->setParent($parent);
            $category->setName(ucfirst($faker->word(1)));
            $manager->persist($category);

            $this->addReference('category_' . $i, $category);
        }

        $manager->flush();
    }
}

/*
Pour contourner le contrôle des foreign keys :
    php bin/console doctrine:schema:drop --force
    php bin/console doctrine:schema:update --force
    php bin/console doctrine:fixtures:load
*/