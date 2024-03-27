<?php 
include "profile.php";
include "includes/db.inc.php";
include "includes/functions.inc.php";


if(!empty($_POST['updatePassword'])){
    $oldPass = $_POST['currentPwd'];
    $newPass = $_POST['newPwd'];
    $repPass = $_POST['repeatPwd'];
    // var_dump("1");
    if($newPass == $repPass){

        // $hashed_oldPass = hash('123', $oldPass);
        // var_dump("2");

        $sql = "SELECT * FROM users WHERE `password`='$oldPass'";
        $result = mysqli_query($conn, $sql);
        // var_dump("3");

        if (mysqli_num_rows($result) > 0) {
            // $hashed_newPass = hash('111', $newPass);
            // var_dump("4");

            $update_sql = "UPDATE users SET `password` = '$newPass' WHERE `id` = '";
            $update_result = mysqli_query($conn, $update_sql);
            // var_dump("5");

            if ($update_result) {
                echo "Password Updated";
                // var_dump("6");

            } else {
                echo "Error updating password";
                // var_dump("7");

            }
        } else {
            // var_dump("8");

            echo "Old password does not match";
        }
    } else {
        // var_dump("9");

        echo "New Password and Repeat Password don't match";
    }
} else {
    // var_dump("10");

    echo "Form submission error";
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
                        <span id="showPass">
                            <span class="material-symbols-outlined" style="display:none;">visibility</span>
                            <span class="material-symbols-outlined">visibility_off</span>
                        </span>
                        <span class="password-cm">Lorem ipsum dolor sit amet.</span>                                    
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-label" for="repeatPwd">Repeat Password</label>
                        <input class="form-control signIn-input" type="text" name="repeatPwd" id="myrePass">
                        <span id="showPass">
                            <span class="material-symbols-outlined" style="display:none;">visibility</span>
                            <span class="material-symbols-outlined">visibility_off</span>
                        </span>
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