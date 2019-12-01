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
        dump($value);

        $startDate = $value->getStartDate();
        $endDate = $value->getEndDate();

        $idJumpingTilt = $value->getJumpingTilt()->getId();

        $lendings = $this->lendingRepository->findByJumpingTilt($idJumpingTilt);

        foreach ($lendings as $lending) {
            if (($startDate >= $lending->getStartDate() && $startDate <= $lending->getEndDate()) || ($endDate >= $lending->getStartDate() && $endDate <= $lending->getEndDate()))
            {
                dump("violation en cours"); 
                $this->context->buildViolation($constraint->message)
                    ->addViolation();
            }
                dump($lending);
        }

        dump($lendings);

        dump($startDate);
        dump($endDate);



        // $lendings = $this->lendingRepository->findBy()


        // die();
        // if (!$constraint instanceof ContainsAlphanumeric) {
        //     throw new UnexpectedTypeException($constraint, ContainsAlphanumeric::class);
        // }

        // // custom constraints should ignore null and empty values to allow
        // // other constraints (NotBlank, NotNull, etc.) take care of that
        // if (null === $value || '' === $value) {
        //     return;
        // }

        // if (!is_string($value)) {
        //     // throw this exception if your validator cannot handle the passed type so that it can be marked as invalid
        //     throw new UnexpectedValueException($value, 'string');

        //     // separate multiple types using pipes
        //     // throw new UnexpectedValueException($value, 'string|int');
        // }

        // if (!preg_match('/^[a-zA-Z0-9]+$/', $value, $matches)) {
        //     $this->context->buildViolation($constraint->message)
        //         ->setParameter('{{ string }}', $value)
        //         ->addViolation();
        // }
    }
}
