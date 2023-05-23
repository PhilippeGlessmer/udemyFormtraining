<?php

namespace App\Service;

use phpDocumentor\Reflection\Types\String_;

class RandomPlace
{
    const PLACES = ['Berlin', 'Alger', 'Paris', 'Londres', 'New-York'];
    const COUNTRY = [
        'Berlin' => 'AL',
        'Alger' => 'DZ',
        'Paris' => 'FR',
        'Londres' => 'UK',
        'New-York' => 'US'
    ];
    public function getRandomPlace(): string
    {
        $places = ['Berlin', 'Alger', 'Paris', 'Londres', 'New-York'];
        return $places[rand(0, count($places)-1)];
    }

    public static function  getCountryByPlace($place){
        if(!in_array($place, self::PLACES)){
            throw new \InvalidArgumentException(sprintf("Wrong city %s", $place));
        }
        return self::COUNTRY[$place];
    }
}