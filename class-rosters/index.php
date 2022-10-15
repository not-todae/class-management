<?php

include ("../init.php");
use Models\ClassRoster;

$class_roster= new ClassRoster('', '', '', '', '', '');
$class_roster->setConnection($connection);
$all_class_rosters = $class_roster->getAll();
var_dump($all_class_rosters);