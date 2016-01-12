<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 29.12.2015
 * Time: 19:41
 */

namespace Filter\Classes;


use Filter\Db\Db;

class Filter implements FilterInterface
{
    /*public function __construct(Db $db)
    {
        return $this->db = $db;
    }*/

    public function filterData($currency,$country,$quantity)
    {
        $sql = "SELECT * FROM price as p
                JOIN countries c ON c.id = p.country_id
                JOIN currency cn ON cn.id = p.currency_id
                WHERE p.price > ".$quantity." and c.name ='".$country."' and cn.name='".$currency."'";
        $query = $this->db->select($sql);
        return $query;
    }
}