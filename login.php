<?php
    require_once dirname(__FILE__).'/DbOperation.php';
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){
        if(isset($_POST['username']) and isset($_POST['password'])){
            $db = new DbOperation();
            if($db->userLogin($_POST['username'],$_POST['password'])){
                $user = $db->getUserDetails($_POST['username']);
                $response['error'] = false;
                $response['message'] = 'Login Successful';
                $response['id'] = $user['id'];
                $response['username'] = $user['username'];
                $response['password'] = $user['password'];
            }
            else{
                $response['error'] = true;
                $response['message'] = 'Invalid username/password';
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