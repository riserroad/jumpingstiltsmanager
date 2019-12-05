<?php

namespace App\DataFixtures;

use App\Entity\StorageArea;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class StorageAreaFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $tourcoingStorageArea = new StorageArea; 
        $tourcoingStorageArea->setName('Tourcoing');
        $manager->persist($tourcoingStorageArea);

        $lilleStorageArea = new StorageArea;
        $lilleStorageArea->setName('Lille');
        $manager->persist($lilleStorageArea);

        $manager->flush();
    }
}
