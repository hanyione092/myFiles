<?php
    require_once('Employee.php');
    Class Destination extends Employee
    {
        public $destination;

        public function __construct($name, $age, $employer, $destination)
        {
            $this->name = $name;
            $this->age = $age;
            $this->employer = $employer;
            $this->destination = $destination;
        }

        public function get_destination()
        {
            return "Destination: $this->destination";
        }
    }
    //here, parent nya yung employee and person kasi pwede nya lahat magamit dito ang functions ng ininherit nya
?>