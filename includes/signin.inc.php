<?php
session_start();

$message = ''; 
    // Check if submit button pressed
    if (isset($_POST["submitBtn"])) {
 
        $pwdRepeat = $_POST["pwdrepeat"];
        $gender = $_POST["gender"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $username = $_POST["uid"];
        $pwd = $_POST["pwd"];

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
        if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {

            // uploaded file details
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
            
            if (in_array($fileExtension, $allowedfileExtensions)) {                
                // directory where file will be moved
                $uploadFileDir = 'C:\xampp2\htdocs\shopping\uploads\uploadFile';
                $dest_path = $uploadFileDir . $newFileName;          
                if(move_uploaded_file($fileTmpPath, $dest_path)) {
                    $message = 'File uploaded successfully.';
                }
                else {
                $message = 'An error occurred while uploading the file to the destination directory. Ensure that the web server has access to write in the path directory.';
                }
            }
            else {
              $message = 'Upload failed as the file type is not acceptable. The allowed file types are:' . implode(',', $allowedfileExtensions);
            }
        }

        createUser($conn,$name,$email, $username, $pwd, $gender, $dest_path);
    }
    else {
        $message = 'Error occurred while uploading the file.<br>';
        $message .= 'Error:' . $_FILES['uploadedFile']['error'];
        header("Location: ../signIn.php");
        exit();
    }
    $_SESSION['message'] = $message;

