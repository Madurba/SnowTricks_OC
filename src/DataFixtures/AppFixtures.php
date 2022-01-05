<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Comments;
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
                  ->setUpdateAt( $faker->dateTimeBetween() )
                  ->setCategory( $faker->word(2) )
                  ->setPictures( $faker->sentence(2) )
                  ->setVideos( $faker->sentence(2) );
            
            $manager->persist($trick);
        }

        for ($i = 0; $i < 2 ;$i++) {
            $category = new Category();
            $category->setName( $faker->word(2) )
                     ->setTricks( $faker->word(2) );

            $manager->persist($category);
        }

        for ($i = 0; $i < 2 ;$i++) {
            $comments = new Comments();
            $comments->setTrick( $faker->word(3) )
                     ->setComment( $faker->sentence(6) )
                     ->setCreateAt( $faker->dateTimeBetween() )
                     ->setUser( $faker->word(2) );


            $manager->persist($comments);
        }



        $manager->flush();
    }
}
