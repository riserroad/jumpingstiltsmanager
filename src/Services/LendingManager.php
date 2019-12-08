<?php

namespace App\Services;

use App\Repository\LendingRepository;

class LendingManager
{
    private $lendingRepository; 

    public function __construct(LendingRepository $lendingRepository)
    {
        $this->lendingRepository = $lendingRepository; 
    }

    public function getBadLending()
    {
        $nowDate = new \DateTime(); 
        $badLendings = [] ; 

        $lendings = $this->lendingRepository->findAll(); 
        foreach ($lendings as $lending)
        {
            // verif the lendings 
            if ($lending->getEndDate() < $nowDate && $lending->getStatus()->getName() == "En cours")
            {           
                array_push($badLendings, $lending); 
            }

        }

        return $badLendings; 
    }
}