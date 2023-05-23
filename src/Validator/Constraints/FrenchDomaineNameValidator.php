<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class FrenchDomaineNameValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint)
    {
        if($extension = 'fr' !== strtolower(pathinfo($value, PATHINFO_EXTENSION))){
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{string}}', $extension)
                ->addViolation();
        }
    }
}