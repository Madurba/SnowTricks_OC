<?php

namespace App\DataFixtures;

use App\Entity\Message;
use App\Entity\Tricks;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 12 ;$i++) {
            $trick = new Tricks();
            $trick->setName( $faker->sentence(3) )
                  ->setDescription( $faker->sentence(100) )
                  ->setCreatedAt( $faker->dateTimeBetween() )
                  ->setUpdatedAt( $faker->dateTimeBetween() )
                  ->setSlug( $faker->sentence(1) );

            
            $manager->persist($trick);
        }

        for ($i = 0; $i < 5 ;$i++) {
            $message = new Message();
            $message->setContent( $faker->sentence(10 ) )
                    ->setCreatedAt();


            $manager->persist($message);
        }


        $manager->flush();
    }
}
