<?php
    Class Student
    {
        public $name;
        public $age;
        public $address;

        function __construct($name, $age, $address) {
            $this->name = $name; 
            $this->age = $age; 
            $this->address = $address; 
          }
    
        function call_data(){
            return "name: ".$this->name.", age: ".$this->age.", address: ".$this->address."";
        }
    }
    //---------------------------------------------------


?>