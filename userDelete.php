<?php include "includes/db.inc.php";?>
<?php include "header.php"; ?>

<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $sql = "DELETE FROM `users` WHERE `id` = '$id' ";
        $result = mysqli_query($conn,$sql);
        if(!$result){
            die("Query failed");
        }
        else {
            $newURL = "http://localhost/trendyol/shopping/usersList.php"; 
            header('Location: '.$newURL);
        }
    }

?>










</div>

<?php include "footer.php"; ?>
