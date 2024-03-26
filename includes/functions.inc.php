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

 
    if (!isset($_FILES['uploadedFile'])) {

        return [
            'status' => 0,
            'message' => "The file doesn't send"
        ];
    }

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
   
    // removing extra spaces
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    
    // file extensions allowed
    $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'doc');

    
    if (!in_array($fileExtension, $allowedfileExtensions)) {

        return [
            'status' => 0,
            'message' => "The file is not image"
        ];
    }
   

      // directory where file will be moved
      $uploadFileDir = './uploads';
      $dest_path = $uploadFileDir . $newFileName;
     

      if(move_uploaded_file($fileTmpPath, $dest_path)) {
        return [
            'status' => 1,
            'filename' => $dest_path,

            'message' => 'File uploaded successfully.'
        ];
      } else{
          return [
            'status' => 0,
            'message' => "The upload file has an unknown error."
          ];
      }
}
//     $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
//     $fileName = $_FILES['uploadedFile']['name'];
//     $fileSize = $_FILES['uploadedFile']['size'];
//     $fileType = $_FILES['uploadedFile']['type'];
//     $fileNameCmps = explode(".", $fileName);
//     $fileExtension = strtolower(end($fileNameCmps));
   
//     // removing extra spaces
//     $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
    
//     // file extensions allowed
//     $allowedfileExtensions = array('jpg', 'gif', 'png', 'zip', 'txt', 'doc');
   
//     if (in_array($fileExtension, $allowedfileExtensions)) {

//       // directory where file will be moved
//       $uploadFileDir = 'C:\xampp2\htdocs\shopping\uploads\uploadFile';
//       $dest_path = $uploadFileDir . $newFileName;
     

//       if(move_uploaded_file($fileTmpPath, $dest_path)) {
//         $message = 'File uploaded successfully.';
//       }

//       else 
//       {
//         $message = 'An error occurred while uploading the file to the destination directory. Ensure that the web server has access to write in the path directory.';
//       }

//     }

//     else

//     {
//       $message = 'Upload failed as the file type is not acceptable. The allowed file types are:' . implode(',', $allowedfileExtensions);
//     }

//   }



// $_SESSION['message'] = $message;

// header("Location: uploadImage.php");
// }



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