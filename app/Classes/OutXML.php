<?php
namespace Filter\Classes;

use Filter\Db\Db;

class OutXML implements OutInterface
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
     * return xml
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

        $xml = new \DOMDocument('1,0','utf-8');
        foreach ($row as $item) {
            $xml_id = $xml->createElement('id', $item['id']);
            $xml_price = $xml->createElement('price',$item['price']);
            $xml_price->setAttribute('currency_id',$item['currency_id']);
            $xml_name = $xml->createElement('name',$item['name']);
            $xml_country = $xml->createElement('country', $item[5]);
            $xml_country->setAttribute('id',$item['country_id']);
            $xml->appendChild($xml_id);
            $xml->appendChild($xml_country);
            $xml->appendChild($xml_name);
            $xml->appendChild($xml_price);
        }
        echo $xml->saveXML();
    }
}