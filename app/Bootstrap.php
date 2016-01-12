<?php
namespace Filter;

use Filter\Db\Db;
use Filter\Classes\Services;
use Filter\Classes\OutputInfo;
use Filter\Classes\Filter;
use \Filter\Classes\Form;

$db = Db::getInstance();

$services = new Services($db);
/*$filter = new Filter($db);*/
/*$output = new OutputInfo();*/
$getForm = new Form($db);
/*var_dump($db);*/

