<?php
    require_once "db.inc.php";

    $email = $_POST["email"];
    $pwd = $_POST['pwd'];

    // Fetching the hashed password from the database
    $stmt = $conn->prepare("SELECT usersPwd FROM users WHERE usersEmail = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $hashedPwd = $row['usersPwd'];

        // Verifying the hashed password
        if (password_verify($pwd, $hashedPwd)) {
            echo "</br>Welcome,You are logined!";
        } else {
            echo "</br>Wrong password";
        }
    } else {
        echo "</br>User not found";
    }

    $stmt->close();
    $conn->close();
    ?>



























<?php

    // $email = $_POST["email"];
    // $pwd = $_POST['pwd'];
    // $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    // $check = mysqli_query($conn,"SELECT * FROM users WHERE `usersEmail` = '$email' AND `usersPwd` = '$pwd'");

    // if(mysqli_num_rows($check) > 0){
    // echo 'welcome';
    // }
    // else { 
    //     echo 'wrong';
    // }




        