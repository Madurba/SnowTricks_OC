<?php

namespace App\DataFixtures;

use App\Entity\TypeTricks;
use App\Entity\Commentaries;
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
                  ->setDescription( $faker->sentence(6) )
                  ->setCreateAt( $faker->dateTimeBetween() )
                  ->setUpdateAt( $faker->dateTimeBetween() )
                  ->setTypeTricks( $faker->word(2) )
                  ->setMainPicture( $faker->sentence(2) )
                  ->setAddVideo( $faker->sentence(2) );
            
            $manager->persist($trick);
        }

        for ($i = 0; $i < 2 ;$i++) {
            $category = new TypeTricks();
            $category->setName( $faker->word(2) )
                     ->setTricks( $faker->word(2) );

            $manager->persist($category);
        }

        for ($i = 0; $i < 2 ;$i++) {
            $comments = new Commentaries();
            $comments->setTrick( $faker->word(3) )
                     ->setComment( $faker->sentence(6) )
                     ->setCreateAt( $faker->dateTimeBetween() )
                     ->setUser( $faker->word(2) );


            $manager->persist($comments);
        }



        $manager->flush();
    }
}
