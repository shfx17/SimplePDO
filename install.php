<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath.'/crudPDO.php');

$object = new DBConnect();
$object->install();
?>