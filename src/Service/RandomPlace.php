<?php

namespace App\Service;

use phpDocumentor\Reflection\Types\String_;

class RandomPlace
{
    public function getRandomPlace(): string
    {
        $places = ['Berlin', 'Alger', 'Paris', 'Londres', 'New-York'];
        return $places[rand(0, count($places)-1)];
    }
}