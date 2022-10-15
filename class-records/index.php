<?php

include ("../init.php");
use Models\Classes;

$class_record= new Classes('', '', '', '', '', '');
$class_record->setConnection($connection);
$all_class_records = $class_record->getAll();
var_dump($all_class_records);