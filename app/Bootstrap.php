<?php
namespace Filter;

use Filter\Db\Connect;
use Filter\Db\DbFunctions;

$db = Connect::getInstance();

$func = new DbFunctions($db);

/*var_dump($db);*/

