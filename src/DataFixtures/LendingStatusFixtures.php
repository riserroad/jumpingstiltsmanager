<?php

namespace App\DataFixtures;

use App\Entity\LendingStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class LendingStatusFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $inProgressLengindStatus = new LendingStatus;
        $inProgressLengindStatus->setName('En cours'); 
        $manager->persist($inProgressLengindStatus); 

        $finishedLendingStatus = new LendingStatus; 
        $finishedLendingStatus->setName('Paire rendu');
        $manager->persist($finishedLendingStatus);
        
        $manager->flush();
    }
}
