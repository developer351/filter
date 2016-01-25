<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 21.01.2016
 * Time: 8:50
 */

namespace Filter\Classes;

use Filter\Db\Db;


class OutJson
{
    public function __construct(Db $db, $country, $currency, $quantity)
    {
        $this->db = $db;
        $this->country = $country;
        $this->currency = $currency;
        $this->quantity = $quantity;
    }

    /**
     * this method  printing in json format
     * @return json
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

        foreach ($row as $items) {
            $jsonData = array(
                "country" => $items[5],
                "country_id" => $items['country_id'],
                "price" => array(
                    array(
                        "currency_id" => $items['currency_id'],
                        "name" => $items['name'],
                        "price" => $items['price']
                    ))
            );
        }
        echo json_encode($jsonData);

    }
}