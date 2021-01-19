<?php
session_start();

if (isset($_POST['btn-submit'])){
    unset($_SESSION['get-empno']);
    $_SESSION['get-empno'] = $_POST['user'];
  
  }
  $empno = $_SESSION['get-empno'];
  
  echo $empno;

?>