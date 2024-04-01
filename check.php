<?php
    session_start();
    include "includes/db.inc.php";
    include "includes/functions.inc.php";

    $id       = $_POST['id'];
    $name       = $_POST['name'];
    $usernameid = $_POST['usernameid'];
    $email      = $_POST['email'];

    $response['status'] = 1;



        if(empty($name)){
            $response['status'] = 0;
            $response['message']['name'] = "Your Name is empty...";  
        } else{
            if(strlen($name) < 3){
                $response['status'] = 0;
                $response['message']['name'] = "Your Name must be over 3 charachter...";  
             
            }else if (preg_match("/^[0-9]*$/", $name)){
                $response['status'] = 0;
                $response['message']['name'] = "Your Name has wrong charachter..."; 

            }   
        }
  
    
        if(empty($usernameid)){
            $response['status'] = 0;
            $response['message']['username'] = "Your userName is empty..."; 

        } else {
            if(strlen($usernameid) < 3){
                $response['status'] = 0;
                $response['message']['username'] = "Your userName must be over 3 charachter..."; 

            }else if (!preg_match("/^[a-zA-Z0-9]*$/", $usernameid)){
                $response['status'] = 0;
                $response['message']['username'] = "Your userName has wrong charachter..."; 

            } 
         

        }
   
        if(empty($email)){
            $response['status'] = 0;
            $response['message']['email'] = "Your email is empty"; 

        } else {
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $response['status'] = 0;
                $response['message']['email'] = "Your email wrong"; 

            }
        }

    
        // if (uidExists($conn, $usernameid , $email)){
        //     $response['status'] = 0;
        //     $response['message']['username'] = "Your userName already has been there..."; 

        // }      
        
        
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
                echo json_encode($response);                
                exit();
            }
        } else {
            echo json_encode($response);                
            exit();
        }



    
?>


