<?php

namespace App\Service;

class Technologie
{
    public const BACK = ['PHP', 'Ruby', 'Java'];
    public const FRONT = ['Javascript', 'Css', 'React'];

    public static function backOrFront($language){
        if(in_array($language, self::BACK)){
            return 'Back';
        }
        if(in_array($language, self::FRONT)){
            return 'Front';
        }
        throw  new \InvalidArgumentException(sprintf("the language %s doesn't exist", $language));
    }
    public static function getListTechno(){
        return array_merge(self::FRONT, self::BACK);
    }
}