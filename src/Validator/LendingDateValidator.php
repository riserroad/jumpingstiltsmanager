<?php

namespace App\Validator;

use App\Entity\Lending;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;
use App\Repository\LendingRepository;

class LendingDateValidator extends ConstraintValidator
{
    private $lendingRepository;

    public function __construct(LendingRepository $lendingRepository)
    {
        $this->lendingRepository = $lendingRepository;
    }
    public function validate($value, Constraint $constraint)
    {
        if (!$value instanceof Lending) {
            throw new UnexpectedTypeException($value, Lending::class);
        }

        $startDate = $value->getStartDate();
        $endDate = $value->getEndDate();

        if(!$value->getJumpingTilt())
        {
            return ;
        }

        $idJumpingTilt = $value->getJumpingTilt()->getId();

        $lendings = $this->lendingRepository->findByJumpingTilt($idJumpingTilt);

        foreach ($lendings as $lending) {
            if ( $value->getId() == $lending->getId())
            {
                continue; 
            }

            if (($startDate >= $lending->getStartDate() && $startDate <= $lending->getEndDate()) || ($endDate >= $lending->getStartDate() && $endDate <= $lending->getEndDate())) {
                $this->context->buildViolation($constraint->message)
                    ->addViolation();

                break;
            }
        }
    }
}
