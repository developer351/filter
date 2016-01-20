<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 06.01.2016
 * Time: 7:59
 */

namespace Filter\Classes;


class OutputInfo
{
    public function printData($data)
    {

        foreach ($data as $item) {
            echo "<pre>";
            print_r($item);
            echo "</pre>";
        }

    }

    public function saveJson($data)
    {
        foreach ($data as $items) {
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

    public function saveXml($data)
    {
    $xml = new \DOMDocument('1,0','utf-8');
        foreach ($data as $item) {
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