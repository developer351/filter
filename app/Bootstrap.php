<?php
namespace Filter;

use Filter\Classes\Display;
use Filter\Db\Db;
use Filter\Classes\Services;
$db = Db::getInstance();

$services = new Services($db);
$display = new Display($db);

/*var_dump($db);*/

