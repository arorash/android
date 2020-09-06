<?php
    require_once dirname(__FILE__).'/DbOperation.php';
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['username']) and isset($_POST['password'])){
            $db = new DbOperation();
            $result = $db->create_user($_POST['username'],$_POST['password']);
            if($result == 1){
                $response['error']=false;
                $response['message']="User registered successfully";
            }
            elseif($result == 2){
                $response['error']=true;
                $response['message']="Some error occour";
            }
            elseif($result == 0){
                $response['error']=true;
                $response['message']="Email is already exist.";
            }
        }
        else{
            $response['error'] = true;
            $response['message'] = 'Require field are missing';
        }
    }
    else{
        $response['error']=true;
        $response['message']="Invalid Request";
    }



    echo json_encode($response);
