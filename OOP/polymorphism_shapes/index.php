<?php
include_once('poly.php');

const BR = '</br>';

$circle = new Circle(5);
echo $circle->calcArea().BR;

$rectangle = new Rectangle(5,10);
echo $rectangle->calcArea().BR;
?>
