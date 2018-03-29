<?php

require_once __DIR__ . '/user.php';

$name = "";
$pass = "";
$email = "";

if(isset($_POST['username'])){
        
        $username = $_POST['name'];
        
    }
    
    if(isset($_POST['password'])){
        
        $password = $_POST['pass'];
        
    }
    
    if(isset($_POST['email'])){
        
        $email = $_POST['email'];
        
    }

$userObject = new User();
    
    // Registration
    
    if(!empty($username) && !empty($password) && !empty($email)){
        
        $hashed_password = md5($password);
        
        $json_registration = $userObject->createNewRegisterUser($username, $hashed_password, $email);
        
        echo json_encode($json_registration);
        
    }
    // Login
    
    if(!empty($username) && !empty($password) && empty($email)){
        
        $hashed_password = md5($password);
        
        $json_array = $userObject->loginUsers($username, $hashed_password);
        
        echo json_encode($json_array);
    }
    
?>