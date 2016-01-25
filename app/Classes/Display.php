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
use Filter\Db\Db;

class Display extends FactoryMethod
{
    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    protected function output($variant)
    {
        (string)$format = htmlspecialchars($_POST['format']);
        (string)$country = htmlspecialchars($_REQUEST['country']);
        (string)$currency = htmlspecialchars($_REQUEST['currency']);
        (int)$quantity = htmlspecialchars($_REQUEST['quantity']);
        switch ($variant){
            case $format == 'Print':
                return new OutPrint($this->db, $country, $currency, $quantity);
            break;
            case $format == 'Json':
                return new OutJson($this->db, $country, $currency, $quantity);
            break;
            case $format == 'Xml':
                return new OutXML($this->db, $country, $currency, $quantity);
            break;
            default:
                throw new \InvalidArgumentException("$format is not a valid vehicle");
        }
    }
}