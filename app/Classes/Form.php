<?php
namespace Filter\Classes;

use Filter\Db\Db;

class Form extends Filter implements FormInterface
{
    public function __construct(Db $db)
    {
        return $this->db = $db;
    }

    public function getFormData()
    {
        $output = new OutputInfo();
        $country = htmlspecialchars($_POST['country']);
        $currency = htmlspecialchars($_POST['currency']);
        $quantity = htmlspecialchars($_POST['quantity']);
        (string)$format = htmlspecialchars($_POST['format']);


        try {
            if (!empty($country) && !empty($currency) && !empty($quantity)) {
                 switch($format){
                     case $format == 'Print':
                         $data = $this->filterData($currency, $country, $quantity);
                         $output->printData($data);
                         break;
                     case $format == 'Xml':
                         $data = $this->filterData($currency, $country, $quantity);
                         $output->saveXml($data);
                         break;
                     case $format == 'Json':
                         $data = $this->filterData($currency, $country, $quantity);
                         $output->saveJson($data);
                         break;
                     default :
                         throw new \Exception('Empty parameter');
                         break;
                 }
            }
        }catch (\RuntimeException $e){
            die("error - ".$e->getMessage()."line". $e->getLine());
        }
    }
}