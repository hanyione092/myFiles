<?php
//Sa Object Oriented Programming, sa class, hindi magandang idea ang mag-implement ng conditional statement kasi ang class should do one thing, so dito pumapasok yung polymorphism, sya yung pinaka conditional statement ng class. 

const BR = '<br />';

interface Element{
    public function characteristics();
}

class Water implements Element{
    public function characteristics(){
        return array('water 1', 'water 2', 'water 3', 'water 4');
    }    
}
class Fire implements Element{
    public function characteristics(){
        return array('fire 1', 'fire 2', 'fire 3', 'fire 4');
    }
}
class Air implements Element{
    public function characteristics(){
        return array('air 1', 'air 2', 'air 3', 'air 4');
    }
}
class Earth implements Element{
    public function characteristics(){
        return array('earth 1', 'earth 2', 'earth 3', 'earth 4');
    }
}

function describe (Element $element){
    echo '<strong>'.get_class($element).'</strong>'.BR;
    if (is_array($element->characteristics())){
        foreach($element->characteristics() as $characteristics){
            echo $characteristics.BR;
        }
    }
}
$element = new Water;
describe($element);
echo BR;
$element = new Fire;
describe($element);
echo BR;
$element = new Air;
describe($element);
echo BR;
$element = new Earth;
describe($element);
echo BR;
?>