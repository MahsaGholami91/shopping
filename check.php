<?php
    session_start();
    include "includes/db.inc.php";
    include "includes/functions.inc.php";

    $id         = $_POST['id'];
    $name       = $_POST['name'];
    $usernameid = $_POST['usernameid'];
    $email      = $_POST['email'];
    $hidden     = $_POST['hidden'];
    if(isset($_SESSION['username'])) {
        $result = getUser($conn, $_SESSION['username']);
    }
    $response['status'] = 1;
      
        if($hidden !== $result['id']){
            $response['status'] = 0;
            $response['message']['auth'] = "Your authentication is failed.";
            echo json_encode($response);                
                exit();
        } else {
            if(empty($name)){
                $response['status'] = 0;
                $response['message']['name'] = "Your Name is empty.";  
            } else{
                if(strlen($name) < 3){
                    $response['status'] = 0;
                    $response['message']['name'] = "Your Name must be over 3 charachter.";  
                    
                }else if (preg_match("/^[0-9]*$/", $name)){
                    $response['status'] = 0;
                    $response['message']['name'] = "Your Name has wrong charachter."; 
                }   
            }
            
            if(empty($usernameid)){
                $response['status'] = 0;
                $response['message']['username'] = "Your userName is empty.";
            } else {
                if(strlen($usernameid) < 5){
                    $response['status'] = 0;
                    $response['message']['username'] = "Your userName must be over 5 charachter.";
    
                }else if (preg_match("/^[0-9]*$/", $usernameid)){
                    $response['status'] = 0;
                    $response['message']['username'] = "Your userName has wrong charachter.";
                }
            }
            if(empty($email)){
                $response['status'] = 0;
                $response['message']['email'] = "Your email is empty."; 
    
            } else {
                if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $response['status'] = 0;
                    $response['message']['email'] = "Your email wrong."; 
                }
            }
          
            if($response['status'] == 1){
                if (!empty($_FILES['uploadedFile'])) {  
    
                    $response = uploadFile();
                }
                $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' WHERE `id` = '$id'";
            
                if(!empty($response['filename'])){
                    $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' , `image` =  '" . $response['filename'] . "'  WHERE `id` = '$id'";
                }
        
                $result = mysqli_query($conn,$sql);
        
                if($result){      
                    $response['message']['success'] = "your data updated.";
                    echo json_encode($response);                
                    exit();
                }
            } else {
                echo json_encode($response);                
                exit();
            }


        } 
?>


