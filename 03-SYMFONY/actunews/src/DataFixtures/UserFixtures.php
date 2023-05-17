<?php
namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder) {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create("fr_FR");

        $user = new User();
        $user->setEmail('admin@mail.com')
            ->setDisplayName('Administrateur')
            ->setRoles(['ROLE_ADMIN'])
            ->setPassword($this->encoder->hashPassword($user, '123456'))
            ->setIsVerified(true);
        $manager->persist($user);

        for($i = 1; $i <= 30; $i++) {
            $user = new User();
            $user->setEmail($faker->email())
                ->setDisplayName($faker->name())
                ->setRoles(['ROLE_USER'])
                ->setPassword($this->encoder->hashPassword($user, '123456'))
                ->setIsVerified(true);
            $manager->persist($user);

            $this->addReference('user_' . $i, $user);
        }

        $manager->flush();
    }
}