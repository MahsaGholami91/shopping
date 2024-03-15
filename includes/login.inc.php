<?php
    // Check if submit button pressed
    if (isset($_POST["submit"])) {
        $username = $_POST['uid'];
        $pwd = $_POST['pwd'];

        require_once "db.inc.php";
        require_once "functions.inc.php";

        if(emptyInputLogin($username, $pwd) !== false   ){
            header("location: ../signIn.php?error=emptyinput");
            exit();
        }
        loginUser($conn, $username , $pwd);

    }
    else {
    header("location: ../signIn.php");
    exit();
}
        