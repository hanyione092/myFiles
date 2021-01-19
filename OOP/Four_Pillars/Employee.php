<?php
require_once('Person.php');
Class Employee extends Person //this is an example of Inheritance, minana lahat natin ang properties kay Person. Iniinherit ng child class ang ilang features ng base class. (to Eliminate redundant code).
{

    public function getEmployer()
    {
        return "Employer: $this->employer<br />";
    }
}
//here, ang parent class nya is yung Person, child yung employee
//gagana pa rin kahit tanggalin mo ang public $employer at function __contruct kasi nasa destination.php lahat ng properties and construct

?>