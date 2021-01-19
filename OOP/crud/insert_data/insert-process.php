<?php

    Class Database
    {
        public $conn;

        public function __construct()
        {
            $this->conn = new mysqli("localhost", "root", "", "oop");
        }

        public function InsertData($post)
        {
            $name = $_POST['name'];
            $age = $_POST['age'];
            $address = $_POST['address'];

            $sql = "INSERT INTO tbl_user (name, age, address) VALUES ('$name', '$age', '$address')";
            $result = $this->conn->query($sql);
            if ($result)
            {
                header("Location:index.php?msg");
            }else{
                die("shit!");
            }
        }
    }
?>