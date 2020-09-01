<?php
    require_once dirname(__FILE__).'/DbOperation.php';
    $response = array();
    /*if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['username']) and isset($_POST['password'])){

        }
        else{
            $response['error'] = true;
            $response['message'] = 'Require field are missing';
        }
    }
    else{
        $response['error']=true;
        $response['message']="Invalid Request";
    }*/

    $db = new DbOperation();
            if($db->create_user("Shashank","Shashank1@")){
                $response['error']=false;
                $response['message']="User registered successfully";
            }
            else{
                $response['error']=true;
                $response['message']="Some error occour";
            }

    echo json_encode($response);