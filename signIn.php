<?php include "header.php"; ?>
        <!-- main body -->
        <div class="container login-page">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <h1>Merhaba!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Gris yap</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">oye ol</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                            <form class=" login-form" action="includes/login.inc.php" method="post">
                                <div class="d-flex flex-column">
                                    <div class="input-group mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input class="form-control login-input" type="text" name="email" id="email">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="form-label" for="password">Password</label>
                                        <input class="form-control login-input" type="password" name="pwd" id="password">
                                        <a class="forget-pass" href="">sifre unutum!</a>
                                    </div>
                                    <div class="input-group my-4">
                                        <button class="giris-submit btn" name="submit" type="submit">giris yap</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                            <form class="signIn-form" action="includes/signin.inc.php" method="POST">
                                <div class="d-flex flex-column">
                                    <div class="input-group mb-3">
                                        <label class="form-label" for="usersName">Name</label>
                                        <input class="form-control signIn-input" type="text" name="name" id="name">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="form-label" for="uid">Username</label>
                                        <input class="form-control signIn-input" type="text" name="uid" id="username">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="form-label" for="usersEmail">Email</label>
                                        <input class="form-control signIn-input" type="email" name="email" id="email">
                                    </div>
                                    <div class="input-group mb-3">
                                        <label class="form-label" for="usersPwd">Password</label>
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
                                    <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                        <input type="radio" class="btn-check " name="gender" id="btnradio1" autocomplete="off" value="0" checked>
                                        <label class="btn gender-btn" for="btnradio1">Kadin</label>
                                        <input type="radio" class="btn-check " name="gender" id="btnradio2" autocomplete="off" value="1" >
                                        <label class="btn gender-btn" for="btnradio2">Erkek</label>
                                      </div>
                                 
                                    <div class="input-group my-4">
                                        <button class="giris-submit btn" type="submit" name="submitBtn">Uye ol</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                        <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                                    echo "<p>Fill in all fiels!<p>";
                                }
                                else if ($_GET["error"] == "invalidUid") {
                                    echo "<p>Choose a proper username!<p>";
                                }
                                else if ($_GET["error"] == "invalidEmail") {
                                    echo "<p>Choose a proper email!<p>";
                                }
                                else if ($_GET["error"] == "passworddontmatch") {
                                    echo "<p>Passwors doesnt match!<p>";
                                }
                                else if ($_GET["error"] == "usernametaken") {
                                    echo "<p>Username allready taken!<p>";
                                }
                                else if ($_GET["error"] == "stmtfailed") {
                                    echo "<p>Something went wring, try again!<p>";
                                }
                                else if ($_GET["error"] == "none") {
                                    echo "<p>You have signed in!<p>";
                                }
                            }
                        ?>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <!-- main body -->
    </div>
         
    <?php include "footer.php"; ?>

<?php 

        if (isset($_GET["error"])) {
            if ($_GET["error"] == "emptyinput") {
                echo "<p>Fill in all fiels!<p>";
            }
            else if ($_GET["error"] == "invalidUid") {
                echo "<p>Choose a proper username!<p>";
            }
            else if ($_GET["error"] == "invalidEmail") {
                echo "<p>Choose a proper email!<p>";
            }
            else if ($_GET["error"] == "passworddontmatch") {
                echo "<p>Passwors doesnt match!<p>";
            }
            else if ($_GET["error"] == "usernametaken") {
                echo "<p>Username allready taken!<p>";
            }
            else if ($_GET["error"] == "stmtfailed") {
                echo "<p>Something went wring, try again!<p>";
            }
            else if ($_GET["error"] == "none") {
                echo "<p>You have signed in!<p>";
            }
           
        }



?>

  