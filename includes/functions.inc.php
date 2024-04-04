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

function createUser($conn, $name, $email, $username, $pwd) {
    $sql = "INSERT INTO users (fullname, email, username, password) VALUES (? , ? ,? ,?);";
    $stmt = mysqli_stmt_init($conn);
   
    if(!mysqli_stmt_prepare($stmt,$sql) ){
    header("location: ../signIn.php?error=stmtfailed");
    exit();
    }
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
     mysqli_stmt_bind_param($stmt,"ssss",$name, $email, $username, $hashedPwd );

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

function uploadFile(){
    if(!empty( $_FILES['uploadedFile']['error'])) {
        $message = 'Error occurred while uploading the file.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
        return [
            'status' => 0,
            'message' => $message
        ];
    }
    
    $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
    $fileName = $_FILES['uploadedFile']['name'];
    $fileSize = $_FILES['uploadedFile']['size'];
    $fileType = $_FILES['uploadedFile']['type'];
    
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'doc');
    
    if (!in_array($fileExtension, $allowedfileExtensions)) {
        return [
            'status' => 0,
            'message' => "The file is not image"
        ];
    }
    
    $uploadFileDir = './uploads/';
    $finalPath = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath, $finalPath)) {
        var_dump("Dsds");
        return [
            'status' => 1,
            'filename' => $finalPath,
            'data' => $fileType,
            'message' => 'File uploaded successfully.'
        ];
      } else{
          return [
            'status' => 0,
            'message' => "The upload file has an unknown error."
          ];
      }
}

function getUser($conn ,$email){
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn , $sql);
    return mysqli_fetch_assoc($result);
}

function createProduct($conn, $productName, $productTitle, $productDesc, $productPrice, $productdisc, $productColor, $productImg) {
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "INSERT INTO `product` ( `name`, `title`, `description`, `price`, `discount`, `color`, `image`) VALUES ($productName, $productTitle, $productDesc, $productPrice, $productdisc, $productColor, $productImg);";
    // var_dump($sql);
    // die;
      
      if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }


    // $sql = "INSERT INTO `product` ( `name`, `title`, `description`, `price`, `discount`, `color`, `image`) VALUES (?, ?, ?, ?, ?, ?, ?);";
    // $stmt = mysqli_stmt_init($conn);
    // if(!mysqli_stmt_prepare($stmt,$sql) ){
    // header("location: ../products.php?error=stmtfailed");
    // echo "not ok";
    // exit();
    // }
    // mysqli_stmt_bind_param($stmt,"sssffss",$productName, $productTitle, $productDesc, $productPrice, $productdisc, $productColor, $productImg);

    // mysqli_stmt_execute($stmt);
    // mysqli_stmt_close($stmt);
    // header("location: ../products.php?error=none");
    // echo "ok";

    // exit();
}

?>