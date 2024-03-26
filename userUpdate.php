

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trendyol Page</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.8/umd/popper.min.js" integrity="sha512-TPh2Oxlg1zp+kz3nFA0C5vVC6leG/6mm1z9+mA81MI5eaUVqasPLO8Cuk4gMF4gUfP5etR73rgU/8PNMsSesoQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">    
    <script src="https://unpkg.com/js-image-zoom@0.4.1/js-image-zoom.js" type="application/javascript"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <meta name="viewport" content="width=device-width, user-scalable=no">
</head>

<?php include "includes/db.inc.php";
        include "includes/functions.inc.php";
?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];                        
        $sql = "SELECT * FROM `users` WHERE `id` = $id ";
        $result = mysqli_query($conn , $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>
<?php 
    if(isset($_POST['updateUser'])){
        if(isset($_GET['id'])){

        $id = $_GET['id'];
        $name       = $_POST['name'];
        $usernameid = $_POST['usernameid'];
        $email      = $_POST['email'];


        $response = uploadFile();
        $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' WHERE `id` = '$id'";

        if(!empty($response['filename'])){
            $sql = "UPDATE `users` set `fullname` = '$name' , `username` = '$usernameid' , `email` = '$email' , `image` =  '" . $response['filename'] . "'  WHERE `id` = '$id'";

        }
        // var_dump($response);
        // exit;
        $result = mysqli_query($conn,$sql);
        
        if(!$result){
            die("queri failed");
        }else {
            header("location: usersList.php");

            // $newURL = "http://localhost/trendyol/shopping/usersList.php"; 
            // header('Location: '.$newURL);
            }
        }
    }
?>

<?php include "layout/header.php"; ?>
        <!-- main body -->
        
        <div class="container login-page">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Merhaba!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <form class="signIn-form" method="POST" enctype="multipart/form-data">
                        <div class="d-flex flex-column">
                            <div class="input-group mb-3">
                                <label class="form-label" for="usersName">Name</label>
                                <input class="form-control signIn-input" type="text" name="name" id="name" value="<?php echo $row['fullname'] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <label class="form-label" for="uid">Username</label>
                                <input class="form-control signIn-input" type="text" name="usernameid" id="username" value="<?php echo $row['username'] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <label class="form-label" for="usersEmail">Email</label>
                                <input class="form-control signIn-input" type="email" name="email" id="email" value="<?php echo $row['email'] ?>">
                            </div>
                            <div class="input-group mb-3">
                                <span>Upload a File:</span>
                                <input type="file" name="uploadedFile" id="uploadedFile" />
                            </div>

                            <img src="<?php echo $row['image'] ?>" alt="">

                            <!-- <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                <input type="radio" class="btn-check " name="gender" id="btnradio1" autocomplete="off" value="0" checked>
                                <label class="btn gender-btn" for="btnradio1">Kadin</label>
                                <input type="radio" class="btn-check " name="gender" id="btnradio2" autocomplete="off" value="1" >
                                <label class="btn gender-btn" for="btnradio2">Erkek</label>
                                </div> -->
                            
                            <div class="input-group my-4">
                                <button class="giris-submit btn" type="submit" name="updateUser" value="UPDATE">Update</button>
                            </div>
                        </div>
                    </form>
                        
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!-- main body -->
    </div>
         
<?php include "layout/footer.php"; ?>





  






