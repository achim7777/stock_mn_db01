<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();

        // Generate 20 fake products
        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setName($faker->words(3, true));  // Generates a random product name
            $product->setDescription($faker->sentence(10));  // Generates a random product description
            $product->setPrice($faker->randomFloat(2, 5, 100));  // Generates a random price between 5 and 100
            $product->setQuantity($faker->numberBetween(1, 100));  // Generates a random quantity between 1 and 100

            $manager->persist($product);
        }
        

        $manager->flush();
    }
}
