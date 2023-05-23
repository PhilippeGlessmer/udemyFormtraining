<?php

namespace App\Validator\Constraints;
use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class FrenchDomaineName extends Constraint
{
    public $message = "L'extention est incorrecte, elle dois finir par FR";
}