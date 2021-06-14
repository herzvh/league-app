<?php


namespace App\Services;


use phpDocumentor\Reflection\Utils;

class XMLReaderService
{
    public function readToArray($url) {
        if ($url) {
            $xmlObject = simplexml_load_file($url);

            $json = json_encode($xmlObject);
            $phpArray = json_decode($json, true);

            return $phpArray;
        }
        return [];
    }

}
