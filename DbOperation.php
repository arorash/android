<?php
    class DbOperation{
        private $con;
        function __construct()
        {
            require_once dirname(__FILE__).'/DBConnect.php';
            $db = new DBConnect();
            $this->con = $db->connect();
        }

        public function create_user($username,$password){
            if($this->isUserExist($username)){
                return 0;
            }
            else{

                $pass = md5($password);
                $stmt = $this->con->prepare("insert into login(username,password) values(?,?);");
                $stmt->bind_param("ss",$username,$password);
                if($stmt->execute()){
                    return 1;
                }
                else{
                    return 2;
                }
            }
        }

        public function userLogin($username,$password){
            $stmt = $this->con->prepare("select id from login where username=? and password=?;");
            $stmt->bind_param("ss",$username,$password);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }

        public function getUserDetails($username){
            $stmt = $this->con->prepare("select * from login where username=?;");
            $stmt->bind_param("s",$username);
            $stmt->execute();
            return $stmt->get_result()->fetch_assoc();
        }

        private function isUserExist($username){
            $stmt = $this->con->prepare("select id from login where username = ?;");
            $stmt->bind_param("s",$username);
            $stmt->execute();
            $stmt->store_result();
            return $stmt->num_rows > 0;
        }
    }
