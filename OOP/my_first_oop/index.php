<?php 

include_once('oop.php');

$data = new Student();
$data->set_data("Patrick", "22", "Male", "Alfonso, Cavite");

echo $data->call_data();


?>