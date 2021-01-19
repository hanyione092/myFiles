<?php
    Class Parents
    {
        public $name;
        public $age;
        public $address;

        public function __construct($name, $age, $address)
        {
            $this->name = $name;
            $this->age = $age;
            $this->address = $address;
        }

        public function get_parent(){
            return "name: ".$this->name." age: ".$this->age." address: ".$this->address;
        }

        
        


    }
?>