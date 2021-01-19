<?php

Class CalcMethod
{
    public $num1;
    public $num2;
    public $operator;
    public $address;

    function set_data($num1, $num2, $operator)
    {
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operator = $operator;
    }

    function call_data()
    {
        switch ($this->operator) {
            case 'add':
                $result = $this->num1 + $this->num2;
                break;
            case 'subt':
                $result = $this->num1 - $this->num2; 
                break;
            case 'mult':
                $result = $this->num1 * $this->num2;
                break;
            case 'div':
                $result = $this->num1 / $this->num2;
                break;
            
            default:
                $result = "Error";
                break;
        }
        return $result;
    }
}

//-------------------
?>