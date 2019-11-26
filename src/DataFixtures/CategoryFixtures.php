<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $babyCategory = new Category;
        $babyCategory->setName('Baby'); 
        $manager->persist($babyCategory); 

        $juniorCategory = new Category; 
        $juniorCategory->setName('Junior'); 
        $manager->persist($juniorCategory); 

        $aldutCategory = new Category; 
        $aldutCategory->setName('Aldute'); 
        $manager->persist($aldutCategory);
                
        $manager->flush();
    }
}
