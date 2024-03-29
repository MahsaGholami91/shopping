<?php

    //     include "includes/db.inc.php";
    //     include "includes/functions.inc.php";

        
    //     echo json_encode(
    //         [
    //             'status' => 1,
    //             'message' => 'ok'
    //         ]
    //     );
    //     exit();
      
    // if(isset($_POST['updateUser'])){
    //     $id = $_POST['id'];
    //     if(!empty($id)){

    //     $name       = $_POST['name'];
    //     $usernameid = $_POST['usernameid'];
    //     $email      = $_POST['email'];

    //     $response = uploadFile();
    //     $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' WHERE `id` = '$id'";
        
    //     if(!empty($response['filename'])){
    //         $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' , `image` =  '" . $response['filename'] . "'  WHERE `id` = '$id'";
    //     }

    //     $result = mysqli_query($conn,$sql);

    //     if($result){


            
    //     echo json_encode(
    //         [
    //             'status' => 1,
    //             'message' => 'ok'
    //         ]
    //     );
    //     exit();

    //         }else {
                
    //     echo json_encode([
            
    //         'status' => 0,
    //         'message' => 'wrong'
    //     ]
    //     );
    //     exit();


    //         }
    //     }
    // }
?>

<?php
include "includes/db.inc.php";
include "includes/functions.inc.php";

if(isset($_POST['updateUser'])){
    $id         = $_POST['id'];
    $name       = $_POST['name'];
    $usernameid = $_POST['usernameid'];
    $email      = $_POST['email'];

    $response = uploadFile();
    $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' WHERE `id` = '$id'";
    $params = array($name, $usernameid, $email);

    if(!empty($response['filename'])){
            $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' , `image` =  '" . $response['filename'] . "'  WHERE `id` = '$id'";
    $params[] = $response['filename'];
    }

    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt === false) {
        echo json_encode([
            'status' => 0,
            'message' => 'Database error: ' . mysqli_error($conn)
        ]);
        exit();
    }

    mysqli_stmt_bind_param($stmt, str_repeat('s', count($params)), ...$params);
    $result = mysqli_stmt_execute($stmt);

    if($result){
        echo json_encode([
            'status' => 1,
            'message' => 'ok'
        ]);
        exit();
    } else {
        echo json_encode([
            'status' => 0,
            'message' => 'Update failed: ' . mysqli_error($conn)
        ]);
        exit();
    }
} else {
    echo json_encode([
        'status' => 0,
        'message' => 'Invalid request'
    ]);
    exit();
}
?>
