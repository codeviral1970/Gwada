<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $plaintextPassword = 'pass';

        $user->setPassword('$2y$13$tUPB5R8R3eVMXAlAMK93RukV2yZ7zBXsmtZ3Np0TeQYcD0iDvZTjm')
        ->setEmail('manbanh@free.fr')
        ->setRoles(['ROLE_ADMIN']);

        $manager->persist($user);

        $manager->flush();
    }
}
