<?php
namespace Filter;

use Filter\Db\Db;
use Filter\Classes\FormData;
use Filter\Classes\OutputInfo;
use Filter\Classes\Filter;

$db = Db::getInstance();

$formData = new FormData($db);
$filter = new Filter($db);
$output = new OutputInfo();

/*var_dump($db);*/

