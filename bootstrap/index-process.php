<?php

    Class Product
    {
        private $servername = "localhost";
        private $name = "root";
        private $password = "";
        private $dbname = "oop";
        public $conn;

        public function __construct()
        {
            $this->conn = new mysqli($this->servername, $this->name, $this->password, $this->dbname);
            if(mysqli_connect_error())
            {
                die("error");
            }
            return $this->conn;
        }

        //insert data process
        public function AddData()
        {
            $item_name = $_POST['item_name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $sql = "INSERT INTO tbl_items (item_name, quantity, price) VALUES ('$item_name', '$quantity', '$price')";
            $result = $this->conn->query($sql);
            if ($result)
            {
                header("Location:index.php?insrtd1");
            }else{
                header("Location:index.php?insrtd0");
            }
        }

        //update data process
        public function UpdateData($post)
        {
            $item_id = $_POST['item_id'];
            $item_name = $_POST['item_name'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price'];
            $sql = "UPDATE tbl_items SET item_name = '$item_name', quantity = '$quantity', price = '$price' WHERE id = '$item_id'";
            $result = $this->conn->query($sql);
            if ($result)
            {
                header("Location:index.php?update1");
            }else{
                header("Location:index.php?update0");
            }            
        }

        //delete data process
        public function DeleteData($id)
        {
            $sql = "DELETE FROM tbl_items WHERE id = '$id'";
            $result = $this->conn->query($sql);
            if ($result)
            {
                header("Location:index.php?delete1");
            }else{
                header("Location:index.php?delete0");
            }  
        }

        //display data processs
        public function DisplayData()
        {
            $sql = "SELECT * FROM tbl_items";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0){
                $data = array();
                while ($row = $result->fetch_assoc()){
                    $data[] = $row;
                }
            }
            return $data;

        }

        //select single data, no while needed like I used to program before
        public function DisplayDataById()
        {
            $sql = "SELECT * FROM tbl_items WHERE id = 1";
            $result = $this->conn->query($sql);
            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }else{
                echo "no record found";
            }
        }

        //alert box functions BEGIN
        public function Alert($alert_info, $message)
        {
            echo '<div class="'.$alert_info.' alert-dismissible fade show" role="alert">
            <strong>'.$message.'</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            </div>';
        }

        //alert box functions END
    }
?>