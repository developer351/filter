<?php
/**
 * Created by PhpStorm.
 * User: bulatov
 * Date: 21.01.2016
 * Time: 9:02
 */

namespace Filter\Classes;

use Filter\Db\Db;


abstract class FactoryMethod
{
    abstract protected function output($variant);

    public function create($variant)
    {
        $obj = $this->output($variant);
        $obj->showResult();

        return $obj;
    }

}