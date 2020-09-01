<?php
    require_once dirname(__FILE__).'/DbOperation.php';
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['username']) and isset($_POST['password'])){
            $db = new DbOperation();
            if($db->create_user($_POST['username'],$_POST['password'])){
                $response['error']=false;
                $response['message']="User registered successfully";
            }
            else{
                $response['error']=true;
                $response['message']="Some error occour";
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
