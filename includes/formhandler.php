<?php 

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "form_db";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }


         


    // Check if submit button pressed
    if (isset($_POST["submitBtn"])) {
        $name = $_POST["name"];
        $last_name = $_POST["last_name"];
        $email = $_POST["email"];
        $user_pass = $_POST["user_pass"];
        $gender = $_POST["gender"];
        
        $sql = "INSERT INTO users (name, last_name, email, user_pass, gender) VALUES ('$name' ,'$last_name' ,'$email' ,'$user_pass' ,'$gender');";

        if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
  
    }
    $conn->close();
?>