<?php
namespace Filter\Db;

class DbFunctions implements DbFunctionsInterface
{
    public function __construct(Connect $db)
    {
        return $this->db = $db;
    }

    public function select($sql)
    {
        print_r($this->db);
    }
}