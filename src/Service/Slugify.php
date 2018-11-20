<?php
/**
 * Created by PhpStorm.
 * User: ikows
 * Date: 20/11/18
 * Time: 11:54
 */

namespace App\Service;


class Slugify
{
    public function generate(string $string)
    {
        $string = trim($string);
        $pattern = "#[[:punct:]]#";
        $string = preg_replace($pattern,'',$string);
        $string = str_replace(' ', '-', $string);
        $string = str_replace('à', 'a', $string);
        $string = str_replace('ç', 'c', $string);
        return $string;
    }
}