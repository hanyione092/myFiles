<?php
class Person
{
    public function introduce()
    {
        return "This person is $this->age years old and has a name of $this->name and he's going to $this->destination<br />";
    }
}

?>