<?php

function emptyInputSignin($name, $email, $username, $pwd, $pwdRepeat) {
    $result=true;
    if(empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;

}
function invalidUid($username) {
    $result=true;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}
function invalidEmail($email) {
    $result=true;
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}
function pwdMatch($pwd, $pwdRepeat) {
    $result =true;
    if($pwd !== $pwdRepeat){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

// function clearInput($item){
//     return htmlspecialchars(trim($item));

// }

function uidExists($conn, $username , $email) {
    $sql = "SELECT * FROM users WHERE username = ? OR email = ? ;";
    $stmt = mysqli_stmt_init($conn);
   
     if(!mysqli_stmt_prepare($stmt,$sql) ){
        header("location: ../signIn.php?error=stmtfailed");
        exit();
     }
     mysqli_stmt_bind_param($stmt,"ss",$username,$email);
     mysqli_stmt_execute($stmt);

     $resultData = mysqli_stmt_get_result($stmt);

     if($row = mysqli_fetch_assoc($resultData)){
        return $row;
     }
     else {
        $result =false;
        return $result;
     }
     mysqli_stmt_close($stmt);
}

function createUser($conn, $name, $email, $username, $pwd, $dest_path) {


   

    $sql = "INSERT INTO users (fullname, email, username, password, fileupload) VALUES (? , ? ,? ,?,?);";
    $stmt = mysqli_stmt_init($conn);
   
    if(!mysqli_stmt_prepare($stmt,$sql) ){
    header("location: ../signIn.php?error=stmtfailed");
    exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
     mysqli_stmt_bind_param($stmt,"sssss",$name, $email, $username, $hashedPwd, $dest_path );

     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
     header("location: ../signIn.php?error=none");
    exit();
}

function emptyInputLogin($username, $pwd) {
    $result=true;
    if( empty($username) || empty($pwd) ){
        $result = true;
    }
    else {
        $result =false;
    }
    return $result;
}

// function loginUser($conn, $username , $pwd){
//     $uidExists =  uidExists($conn, $username , $username) ;
//     if($uidExists === false){
//         header("location: ./signIn.php?error=wronglogin");
//         exit();
//     }
//     $pwdHashed = $uidExists["password"];
//     $checkPwd = password_verify($pwd,$pwdHashed);

//     if($checkPwd === false){
//         header("location: ./signIn.php?error=wronglogin");
//         exit();
//     }
//     else if ($checkPwd === true){
//         session_start();

//     }
// }

function getUser($conn ,$email){
    $sql = "SELECT `fullname` FROM `users` WHERE `email` = '$email'";
    // var_dump($conn);
    // var_dump($sql);
    $result = mysqli_query($conn , $sql);
    return mysqli_fetch_assoc($result);
}


// function editeUser($conn, $name, $email, $username, $pwd) {
//     $sql = "UPDATE users SET lastname='Doe' WHERE id=2";
//     $stmt = mysqli_stmt_init($conn);
   
//     if(!mysqli_stmt_prepare($stmt,$sql) ){
//     header("location: ../signIn.php?error=stmtfailed");
//     exit();
//     }
//     $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
//      mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $hashedPwd );
//      mysqli_stmt_execute($stmt);
//      mysqli_stmt_close($stmt);
//      header("location: ../signIn.php?error=none");
//     exit();
// }

?>