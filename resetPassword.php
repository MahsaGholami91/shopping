<?php 
include "profile.php";
include "includes/db.inc.php";
if(!empty($_SESSION['username'])){
    $row = getUser($conn, $_SESSION['username']);
    $username = $row['username'];
    // var_dump($username);
}

if(!empty($_POST['updatePassword'])){
    $oldPass = $_POST['currentPwd'];
    $newPass = $_POST['newPwd'];
    $repPass = $_POST['repeatPwd'];

    if($newPass == $repPass){


        $sql = "SELECT `password` FROM `users` WHERE `username`='$username'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $hashedPwd = password_hash($newPass, PASSWORD_DEFAULT);
            $update_sql = "UPDATE users SET `password` = '$hashedPwd' WHERE `username`='$username'";
            $update_result = mysqli_query($conn, $update_sql);

            if ($update_result) {
              
                echo "Password Updated";
                

            } else {
                echo "Error updating password";

            }
        } else {

            echo "Old password does not match";
        }
    } else {

        echo "New Password and Repeat Password don't match";
    }
} else {

    echo "You can change your password";
}





?>

<div class="container login-page">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>Change Password!</h1>
            <form class="signIn-form" method="POST" >
                <div class="d-flex flex-column">
                    <div class="input-group mb-3">
                        <label class="form-label" for="currentPwd">Current Password</label>
                        <input class="form-control signIn-input" type="text" name="currentPwd" id="current-password" value="<?php echo $row['pwd'] ?>">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-label" for="newPwd">New Password</label>
                        <input class="form-control signIn-input" type="text" name="newPwd" id="myPass">
                        <!-- <span id="showPass">
                            <span class="material-symbols-outlined" style="display:none;">visibility</span>
                            <span class="material-symbols-outlined">visibility_off</span>
                        </span> -->
                        <span class="password-cm">Lorem ipsum dolor sit amet.</span>                                    
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-label" for="repeatPwd">Repeat Password</label>
                        <input class="form-control signIn-input" type="text" name="repeatPwd" id="myrePass">
                        <!-- <span id="showPass">
                            <span class="material-symbols-outlined" style="display:none;">visibility</span>
                            <span class="material-symbols-outlined">visibility_off</span>
                        </span> -->
                        <span class="password-cm">Lorem ipsum dolor sit amet.</span>                                    
                    </div>

        
                    
                    <div class="input-group my-4">
                        <button class="giris-submit btn" type="submit" name="updatePassword" value="Change Password">Change Password</button>
                    </div>
                </div>
            </form>
                
        </div>
        <div class="col-md-2"></div>
    </div>
</div>
        <!-- main body -->
</div>





<?php include "layout/footer.php";?>