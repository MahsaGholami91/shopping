<?php
    $serverName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "form_db";
    // Create connection
    $conn = mysqli_connect($serverName, $dbUserName, $dbPassword, $dbName);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }