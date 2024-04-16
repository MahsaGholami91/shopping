<?php
require_once "db.inc.php";
var_dump($_FILES);
// Handle file upload
if (!empty($_FILES['file'])) {
    var_dump($_FILES['file']);
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        // File uploaded successfully, return file name
        echo basename($_FILES["file"]["name"]);
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file uploaded.";
}

// Retrieve form data
$productName = $_POST['productname'];
$productTitle = $_POST['productTitle'];
// Add other form fields here...

// Insert data into the database
$sql = "INSERT INTO `product` (`name`, `title`, `image`) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $productName, $productTitle, $_POST["file"]);

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
