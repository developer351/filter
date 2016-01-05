<?php
namespace Filter;

use Filter\Db\Db;
use Filter\Classes\FormData;

$db = Db::getInstance();

$formData = new FormData($db);

/*var_dump($db);*/

