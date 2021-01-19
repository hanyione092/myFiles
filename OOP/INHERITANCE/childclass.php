<?php
    require_once('parentclass.php');
    const BR = '<br/>';
    Class Child extends Parents
    {

        // public function __construct()
        // {
                // parent::__construct($name, $age, $address); //kapag meron nito, kahit magcreate ka ng construct function sa child class, magagamit pa rin nya yung construct function ng parent class
        // }
        //this is called overriding, kapag inalis ko ang comment na to, mavovoid yung function __construct ng parentclass
        
        public function get_child($childname)
        {
            return "He is $childname and his mother is $this->name";
        }
    }

    $data = new Child("Mafe", "23", "Alfonso, Cavite");
    echo $data->get_parent().BR;
    echo $data->get_child("Patrick").BR;
?>