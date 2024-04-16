<?php
require_once "db.inc.php";
require_once "functions.inc.php";
$target_dir = "../uploads/";
$request = 1 ;

if(isset($_POST['request'])){
     $request = $_POST['request'];
}

// upload file

if ($request == 1) {

    $target_file = $target_dir.$_FILES['file']['name'];
    $msg = "";

    // Upload file
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        $msg = "File uploaded successfully.";
    }else{
    $msg = "File uploaded not successfully.";
    }
    echo $msg;
        exit;
}
var_dump($productImgFilename);
            die('ddddd');
// remove file
if ($request == 2) {

    $filename = $target_dir.$_POST['name'];
    unlink($filename);
    exit;
}

if (isset($_POST["createProduct"])) {
    $productName = $_POST['productname']; 
    $productTitle = $_POST['productTitle']; 
    $productDesc = $_POST['productDesc']; 
    $productPrice = $_POST['productPrice']; 
    $productDisc = $_POST['productDisc']; 
    $productColor = $_POST['productColor']; 
    $productCategory = $_POST['category']; 

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        if (empty($_FILES['uploadedFile'])){
            echo "file dosent find";
        }else {
            $productImg = uploadFile();
            $productImgFilename = $productImg['filename'];
            
            
        }
        $sql = "INSERT INTO `product` (`name`, `title`, `description`, `price`, `discount`, `color`, `image`, `catId`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdissi", $productName, $productTitle, $productDesc, $productPrice, $productDisc, $productColor, $productImgFilename, $productCategory);
        
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
} else {
    echo "Error: No product creation request received";
}
?>
