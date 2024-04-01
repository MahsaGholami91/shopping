<?php
    session_start();
    include "includes/db.inc.php";
    include "includes/functions.inc.php";

    $id       = $_POST['id'];
    $name       = $_POST['name'];
    $usernameid = $_POST['usernameid'];
    $email      = $_POST['email'];
    // if($status == 2 && $message == ""){
    //     echo $message = "Please change your data";
    //     exit;
         
    //  }else{

    $status = 2;
    $message = "";

        if(empty($name)){
            $status = 1;
            echo $message = "Your Name is empty...";
        } else{
            if(strlen($name) < 3){
                $status = 1;
                echo $message =   " Your Name must be over 3 charachter...";
            }else if (preg_match("/^[0-9]*$/", $name)){
                $status = 1;
                echo $message =  "Your Name has wrong charachter...";
            }else {
                $status = 0;
                $message = "";
            }      
        }
           
    
        if(empty($usernameid)){
            $status = 1;
            echo $message = "Your userName is empty...";
        } else {
            if(strlen($usernameid) < 3){
                $status = 1;
                echo  $message =  "Your userName must be over 3 charachter...";
            }else if (!preg_match("/^[a-zA-Z0-9]*$/", $usernameid)){
                $status = 1;
                echo $message =  "Your userName has wrong charachter...";
            } else {
            $status = 0;
            $message = "";
            } 
        }
            

        if(empty($email)){
            $status = 1;
            echo  $message =  "Your email is empty";
        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $status = 1;
                echo  $message =  "Your email wrong";

            }else {
                $status = 0;
                $message = "";
            } 
        }
               
            
        if($status == 0 && $message == ""){
            
            $response = uploadFile();
            $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' WHERE `id` = '$id'";
        
            if(!empty($response['filename'])){
                $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' , `image` =  '" . $response['filename'] . "'  WHERE `id` = '$id'";
            }
    
            $result = mysqli_query($conn,$sql);
    
            if($result){      
                echo  $message = "Your data updated";
                exit();
            }
        }
    
        




    
?>


