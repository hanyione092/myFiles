<?php
require_once('destination.php');
const BR = '<br/>';
$person1 = new Destination("Patrick", "25", "Accenture", "BGC Makati");
echo $person1->introduce().BR; //this is an example of abstraction, mas malalim na code, nasa kabilang class pa. we hide the details and complexity. shows only the essentials
echo $person1->getEmployer().BR;
//encapsulation Data is kept hidden. we group related functions together
//polymorphism is kapag inoverride ni Employee ang construct function ng inextend nya na class
//polymorphism is a data plays different role in different times. example nito ay nanay. 
//polymorphism POLY means many and MORPHISM means forms. Refactor ugly switch/case statements
echo $person1->get_destination().BR;

$person2 = new Person("Patrick", "25", "Accenture", "BGC Makati");
?>