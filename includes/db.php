<?php 
// Database connection establishment
$con=mysqli_connect("localhost","root","","form_db");
// Check connection
if (mysqli_connect_errno($con)) {
    echo "MySQL database connection failed: " . mysqli_connect_error();
}
?>