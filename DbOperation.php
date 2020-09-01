<?php
    class DbOperation{
        private $con;
        function __construct()
        {
            require_once dirname(__FILE__).'/DBConnect.php';
            $db = new DBConnect();
            $this->con = $db->connect();
        }

        function create_user($username,$password){
            $pass = md5($password);
            $stmt = $this->con->prepare("insert into login(username,password) values(?,?);");
            $stmt->bind_param("ss",$username,$password);
            if($stmt->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }