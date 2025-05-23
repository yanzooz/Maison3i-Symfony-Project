<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;


class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $hasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $regularUser = new User();
        $regularUser
          ->setEmail('yanzooz@gmail.com')
          ->setPassword($this->hasher->hashPassword($regularUser, 'yanzooz'));
      
        $manager->persist($regularUser);
      
        $adminUser = new User();
        $adminUser
          ->setEmail('admin@mycorp.com')
          ->setRoles(['ROLE_ADMIN'])
          ->setPassword($this->hasher->hashPassword($adminUser, 'yanzooz'));
      
        $manager->persist($adminUser);
        
      
        $manager->flush();
    }
}
