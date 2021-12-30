<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 12 ;$i++) {
            $trick = new Trick();
            $trick->setTitle( $faker->sentence(3) )
                  ->setContent( $faker->sentence(6) )
                  ->setCreateAt( $faker->dateTimeBetween() )
                  ->setCreateAt( $faker->dateTimeBetween() )
                  ->setUserId($faker->numberBetween(0, 100) )
                  ->setTypeTricksId($faker->numberBetween(0, 100) )
                  ->setMainPicture( $faker->sentence(2) );
            
                  $manager->persist($trick);
        }

        $manager->flush();
    }
}
