<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class LendingDate extends Constraint
{
    public $message = "La paires d'échasse est déja louer pour cette période";

    public function getTargets()
    {
        return self::CLASS_CONSTRAINT;
    }
}
