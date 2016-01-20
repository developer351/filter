<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 05.01.2016
 * Time: 15:02
 */

namespace Filter\Classes;

use Filter\Db\Db;

class Services implements ServicesInterface
{
    public function __construct(Db $db)
    {
        return $this->db = $db;
    }
    public function getCountries()
    {
        $sql = "SELECT name FROM countries";
        $result = $this->db->connect()->query($sql);
        return $result;

    }

    public function getCurrensies()
    {
        $sql = "SELECT name FROM currency";
        $result = $this->db->connect()->query($sql);
        return $result;
    }

    public function getFormRequest()
    {

    }
}