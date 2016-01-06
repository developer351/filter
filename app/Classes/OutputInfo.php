<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 06.01.2016
 * Time: 7:59
 */

namespace Filter\Classes;


class OutputInfo implements OutputInfoInterface
{
    public function printData($data)
    {

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }

    public function saveJson()
    {

    }
}