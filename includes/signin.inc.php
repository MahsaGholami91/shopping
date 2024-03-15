<?php 



    // Check if submit button pressed
    if (isset($_POST["submitBtn"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];
        $pwdRepeat = $_POST["pwdrepeat"];
        $gender = $_POST["gender"];

        require_once "db.inc.php";
        require_once "functions.inc.php";

        // check some validation after press submit btn
        if(emptyInputSignin($name, $email, $username, $pwd, $pwdRepeat) !== false   ){
            header("location: ../signIn.php?error=emptyinput");
            exit();
        }
        if(invalidUid($username) !== false   ){
            header("location: ../signIn.php?error=invalidUid");
            exit();
        }
        if(invalidEmail($email) !== false   ){
            header("location: ../signIn.php?error=invalidEmail");
            exit();
        }
        if(pwdMatch($pwd, $pwdRepeat) !== false   ){
            header("location: ../signIn.php?error=passworddontmatch");
            exit();
        }
        if(uidExists($conn, $username) !== false   ){
            header("location: ../signIn.php?error=usernametaken");
            exit();
        }

        createUser($conn,$name,$email,$username,$pwd,$gender);
        // $sql = "INSERT INTO users (name, last_name, email, user_pass, gender) VALUES ('$name' ,'$last_name' ,'$email' ,'$user_pass' ,'$gender');";

        // if ($conn->query($sql) === TRUE) {
        //     echo "New record created successfully";
        // } else {
        //     echo "Error: " . $sql . "<br>" . $conn->error;
        // }
  
    }
    else {
        header("Location: ../signIn.php");
        exit();
    }
    // $conn->close();
?>