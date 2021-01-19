<?php

Class Student
{
    public $name;
    public $age;
    public $gender;
    public $address;

    function set_data($name, $age, $gender, $address)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->address = $address;
    }

    function call_data()
    {
        return "name: ".$this->name.", age: ".$this->age.", gender: ".$this->gender.", address: ".$this->address."";
    }
}

?>