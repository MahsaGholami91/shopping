<?php 
include "profile.php";
?>

<div class="container login-page">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <h1>Change Password!</h1>
            <form class="signIn-form" method="POST">
                <div class="d-flex flex-column">
                    <div class="input-group mb-3">
                        <label class="form-label" for="usersName">Current Password</label>
                        <input class="form-control signIn-input" type="text" name="name" id="name" value="<?php echo $row['pwd'] ?>">
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-label" for="usersPwd">New Password</label>
                        <input class="form-control signIn-input" type="password" name="pwd" id="myPass">
                        <span id="showPass">
                            <span class="material-symbols-outlined" style="display:none;">visibility</span>
                            <span class="material-symbols-outlined">visibility_off</span>
                        </span>
                        <span class="password-cm">Lorem ipsum dolor sit amet.</span>                                    
                    </div>
                    <div class="input-group mb-3">
                        <label class="form-label" for="repassword">Repeat Password</label>
                        <input class="form-control signIn-input" type="password" name="pwdrepeat" id="myrePass">
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