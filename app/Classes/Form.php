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
        $country = $_POST['country'];
        $currency = $_POST['currency'];
        $quantity = $_POST['quantity'];
        try {
            if (!empty($country) && !empty($currency) && !empty($quantity)) {
                if ($_POST['format'] == 'Print') {
                    $data = $this->filterData($currency, $country, $quantity);
                    $output->printData($data);
                } else {
                    if ($_POST['format'] == 'Xml') {
                        $data = $this->filterData(
                            $currency, $country, $quantity
                        );
                        $output->saveXml($data);
                    } else {
                        if ($_POST['format'] == 'Json') {
                            $data = $this->filterData(
                                $currency, $country, $quantity
                            );
                            $output->saveJson($data);
                        }
                    }
                }
            }
        }catch (\RuntimeException $e){
            die("error - ".$e->getMessage()."line". $e->getLine());
        }
    }
}