<?php
    class DBConnect{
        private $con;
        function __construct(){

        }
        function connect(){
            include_once dirname(__FILE__).'/constants.php';
            $this->con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME,DB_PORT);

            if(mysqli_connect_errno()){
                echo "Failed to connect database".mysqli_connect_error();
            }
            return $this->con;
        }
    }