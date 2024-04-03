<?php include "includes/db.inc.php";?>
<?php include "layout/header.php"; ?>

<?php
    if(isset($_POST['id'])){
        $id = $_POST['id'];

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

<?php include "layout/footer.php"; ?>
