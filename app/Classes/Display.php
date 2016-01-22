<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 21.01.2016
 * Time: 9:08
 */

namespace Filter\Classes;


use Filter\Classes\OutJson;
use Filter\Classes\OutPrint;

class Display extends FactoryMethod
{
    protected function output($variant)
    {
        (string)$format = htmlspecialchars($_POST['format']);
        switch ($variant){
            case $format == 'Print':
                return new OutPrint();
            break;
            case $format == 'Json':
                return new OutJson();
            break;
            case $format == 'Xml':
                return new OutXML();
            break;
            default:
                throw new \InvalidArgumentException("$format is not a valid vehicle");
        }
    }
}