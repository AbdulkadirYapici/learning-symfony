<?php

namespace App\DataFixtures;

use App\Entity\Blog;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
      $faker= Factory::create();
        // $product = new Product();
        // $manager->persist($product);
        foreach (range (0,10) as $v){
          $blog = new Blog();
          $blog->setEntry($faker->text(20));
          $manager->persist($blog);

        }
        $manager->flush();
    }
}
