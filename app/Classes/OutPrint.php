<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 21.01.2016
 * Time: 8:49
 */

namespace Filter\Classes;

use Filter\Db\Db;

class OutPrint implements OutInterface {

    public function __construct(Db $db, $country, $currency, $quantity)
    {
        $this->db = $db;
        $this->country = $country;
        $this->currency = $currency;
        $this->quantity = $quantity;
    }

    /**
     * this method printing result on display
     * @return array
     */
    public function showResult()
    {
        $sql = "SELECT * FROM price as p
                 JOIN countries c ON c.id = p.country_id
                JOIN currency cn ON cn.id = p.currency_id
                WHERE p.price > :quantity and c.name = :cname and cn.name= :cnname";
        $result = $this->db->connect()->prepare($sql);
        $result->bindParam(':cname', $this->country);
        $result->bindParam(':cnname', $this->currency);
        $result->bindParam(':quantity', $this->quantity);
        $result->execute();
        $row = $result->fetchAll();

        echo "<pre>";
        print_r($row);
    }

}