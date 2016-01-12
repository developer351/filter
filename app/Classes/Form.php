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
        if($_POST['format'] == 'Print'){
            $country = $_POST['country'];
            $currency = $_POST['currency'];
            $quantity = $_POST['quantity'];
            $data = $this->filterData($currency,$country,$quantity);
            $output->printData($data);

        }
    }
}