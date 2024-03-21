<?php
    // Check if submit button pressed
    if (isset($_POST["submitBtn"])) {
 
        $pwdRepeat = $_POST["pwdrepeat"];
        $gender = $_POST["gender"];
        $name = clearInput($_POST["name"]);
        $email = clearInput($_POST["email"]);
        $username = clearInput($_POST["uid"]);
        $pwd = clearInput($_POST["pwd"]);

        require_once "db.inc.php";
        require_once "functions.inc.php";

        // check some validation after press submit btn
        if(emptyInputSignin($name, $email, $username, $pwd, $pwdRepeat) !== false){
            header("location: ../signIn.php?error=emptyinput");
            exit();
        }
        if(invalidUid($username) !== false){
            header("location: ../signIn.php?error=invalidUid");
            exit();
        }
        if(invalidEmail($email) !== false){
            header("location: ../signIn.php?error=invalidEmail");
            exit();
        }
        if(pwdMatch($pwd, $pwdRepeat) !== false){
            header("location: ../signIn.php?error=passworddontmatch");
            exit();
        }
        if(uidExists($conn, $username , $email ) !== false){
            header("location: ../signIn.php?error=usernametaken");
            exit();
        }

        createUser($conn,$name,$email,$username,$pwd,$gender);

  
    }
    else {
        header("Location: ../signIn.php");
        exit();
    }
    // $conn->close();
?>