<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');

        for ($i = 0; $i < 10 ;$i++) {
            $trick = new Trick();
            $trick->setTitle($faker->sentence($nbWords = 2, $variableNbWords = true) )
                  ->setContent($faker->sentence($nbWords = 6, $variableNbWords = true) );
            
                  $manager->persist($trick);
        }

        $manager->flush();
    }
}
