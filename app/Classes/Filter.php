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

    public function filterData()
    {
        $sql = "SELECT name FROM countries";
        $query = $this->db->select($sql);
        return $query;
    }
}