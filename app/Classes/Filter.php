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
    public function __construct(Db $db)
    {
        return $this->db = $db;
    }

    public function filterData($currency,$country,$quantity)
    {
        $sql = "SELECT * FROM price as p
                 JOIN countries c ON c.id = p.country_id
                JOIN currency cn ON cn.id = p.currency_id
                WHERE p.price > :quantity and c.name = :cname and cn.name= :cnname";
        $result = $this->db->connect()->prepare($sql);
        $result->bindParam(':cname', $country);
        $result->bindParam(':cnname', $currency);
        $result->bindParam(':quantity', $quantity);
        $result->execute();
        $row = $result->fetchAll();
        return $row;

    }
}