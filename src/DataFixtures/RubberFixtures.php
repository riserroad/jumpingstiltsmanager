<?php

namespace App\DataFixtures;

use App\Entity\Rubber;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class RubberFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $blackRubber = new Rubber; 
        $blackRubber->setColor('Noir'); 
        $manager->persist($blackRubber);

        $whiteRubber = new Rubber; 
        $whiteRubber->setColor('Blanc');
        $manager->persist($whiteRubber);

        $grayRubber = new Rubber; 
        $grayRubber->setColor('Gris');
        $manager->persist($grayRubber);

        $manager->flush();
    }
}
