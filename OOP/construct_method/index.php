<?php
include_once('oop.php');

$data = new Student("Patrick", "22", "Alfonso, Cavite");
echo $data->call_data();
?>