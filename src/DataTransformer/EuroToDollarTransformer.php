<?php

namespace App\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

class EuroToDollarTransformer implements DataTransformerInterface
{
    public function transform(mixed $value)
    {
        return $value / 1.12;
    }

    public function reverseTransform(mixed $value)
    {
        return $value * 1.12;
    }

}