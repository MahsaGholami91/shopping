<?php
    require_once "db.inc.php";

    $email = $_POST["email"];
    $pwd = $_POST['pwd'];

    $result = mysqli_query($conn,"SELECT * FROM `users` WHERE `email` = '$email'");

    if (mysqli_num_rows($result) > 0) {

        $row = mysqli_fetch_assoc($result);
        $check = password_verify($pwd , $row['password']);

        if($check){
            echo 'welcome';
        }
        else { 
            echo 'wrong';
        }
    } else {
        echo 'wrong';
    }
    ?>
        