<?php
    include_once('calc-process.php'); 

    $data = new CalcMethod();
    $data->set_data($_POST['num1'], $_POST['num2'], $_POST['operator']);
    
    echo $data->call_data();


?>