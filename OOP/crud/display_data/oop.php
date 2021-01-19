<?php
    Class Person
    {
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "cvsuc006_reserviceportal";
        public $conn;

        public function __construct()
        {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
        }

        public function DisplayData()
        {
            $data = '';
            $query = "SELECT * FROM tbl_acct";
            $result = $this->conn->query($query);

            if ($result->num_rows > 0){
                while ($row = $result->fetch_array())
                {
                    $data .= '<li>'.$row['user'].'</li>';
                }
                return $data;
            }else{
                echo "no record found";
            }
        }
    }
?>