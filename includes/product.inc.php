<?php
require_once "db.inc.php";
require_once "functions.inc.php";

if (isset($_POST["createProduct"])) {
    $productName = $_POST['productname']; 
    $productTitle = $_POST['productTitle']; 
    $productDesc = $_POST['productDesc']; 
    $productPrice = $_POST['productPrice']; 
    $productDisc = $_POST['productDisc']; 
    $productColor = $_POST['productColor']; 
    $productCategory = $_POST['category']; 
    $productImg = $_FILES['uploadedFile']; 

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO `product` (`name`, `title`, `description`, `price`, `discount`, `color`, `image`, `catId`) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdissi", $productName, $productTitle, $productDesc, $productPrice, $productDisc, $productColor, $productImg, $productCategory);
        
        if ($stmt->execute()) {
            var_dump($productImg);
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
} else {
    echo "Error: No product creation request received";
}
?>
