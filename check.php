<?php
    session_start();
    include "includes/db.inc.php";
    include "includes/functions.inc.php";

    $id       = $_POST['id'];
    $name       = $_POST['name'];
    $usernameid = $_POST['usernameid'];
    $email      = $_POST['email'];

    $response = array();
    // $message = "";

        if(empty($name)){
            $response['status'] = 1;
            $response['message'] = "Your Name is empty...";  
        } else{
            if(strlen($name) < 3){
                $response['status'] = 1;
                $response['message'] = "Your Name must be over 3 charachter...";  
             
            }else if (preg_match("/^[0-9]*$/", $name)){
                $response['status'] = 1;
                $response['message'] = "Your Name has wrong charachter..."; 

            }else {
                $status = 0;
                $message = "";
            }      
        }
           
    
        if(empty($usernameid)){
            $response['status'] = 1;
            $response['message'] = "Your userName is empty..."; 

        } else {
            if(strlen($usernameid) < 3){
                $response['status'] = 1;
                $response['message'] = "Your userName must be over 3 charachter..."; 

            }else if (!preg_match("/^[a-zA-Z0-9]*$/", $usernameid)){
                $response['status'] = 1;
                $response['message'] = "Your userName has wrong charachter..."; 

            } 
            else {
            $status = 0;
            $message = "";
            } 

        }

        if(empty($email)){
            $response['status'] = 1;
            $response['message'] = "Your email is empty"; 

        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $response['status'] = 1;
                $response['message'] = "Your email wrong"; 

            }else {
                $status = 0;
                $message = "";
            } 
        }
        if (uidExists($conn, $usernameid , $email)){
            $response['status'] = 1;
            $response['message'] = "Your userName already has been there..."; 

        } else {
            $status = 0;
            $message = "";
        }        
        
        
        if($status == 0 && $message == ""){
            
            $response = uploadFile();
            $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' WHERE `id` = '$id'";
        
            if(!empty($response['filename'])){
                $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' , `image` =  '" . $response['filename'] . "'  WHERE `id` = '$id'";
            }
    
            $result = mysqli_query($conn,$sql);
    
            if($result){      
                echo json_encode($response);                
                exit();
            }
        }



    
?>


