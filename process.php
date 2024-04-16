<?php

$target_dir = "uploads/";
$request = 1 ;

if(isset($_POST['request'])){
     $request = $_POST['request'];
}

// upload file

if ($request == 1) {
     $target_file = $target_dir.$_FILES['file']['name'];
     $msg = "";
     
     // var_dump($_FILES);
     // die;
     // Upload file
     if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
          $msg = "File uploaded successfully.";
     }else{
          
          $msg = "File uploaded not successfully.";
     }
     echo $msg;
          exit;
}
// remove file
if ($request == 2) {
     $filename = $target_dir.$_POST['name'];
     unlink($filename);
     exit;

}


