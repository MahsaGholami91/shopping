<?php

        include "includes/db.inc.php";
        include "includes/functions.inc.php";

        
        echo json_encode(
            [
                'status' => 1,
                'message' => 'ok'
            ]
        );
        exit();
      
    if(isset($_POST['updateUser'])){
        $id = $_POST['id'];
        if(!empty($id)){

        $name       = $_POST['name'];
        $usernameid = $_POST['usernameid'];
        $email      = $_POST['email'];

        $response = uploadFile();
        $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' WHERE `id` = '$id'";
        
        if(!empty($response['filename'])){
            $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' , `image` =  '" . $response['filename'] . "'  WHERE `id` = '$id'";
        }

        $result = mysqli_query($conn,$sql);

        if($result){


            
        echo json_encode(
            [
                'status' => 1,
                'message' => 'ok'
            ]
        );
        exit();

            }else {
                
        echo json_encode([
            
            'status' => 0,
            'message' => 'wrong'
        ]
        );
        exit();


            }
        }
    }
?>