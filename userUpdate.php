<?php 
include "profile.php";
    if(isset($_POST['id'])){
        $id = $_POST['id'];                        
        $sql = "SELECT * FROM `users` WHERE `id` = $id ";
        $result = mysqli_query($conn , $sql);
        $row = mysqli_fetch_assoc($result);
    }

    if(isset($_SESSION['username'])) {
        $result = getUser($conn, $_SESSION['username']);
        $logged_in_user_id = $result['id'];

        if(isset($row['id'])) {
            $user_id = $row['id'];
            if($logged_in_user_id == $user_id) {
                echo "User ID matches logged-in user ID.";
            } else {
                echo "User ID does not match logged-in user ID.";
            }
        } else {
            echo "No user ID provided in URL.";
        }
    } else {
        echo "User is not logged in.";
    }

?>
        <!-- main body -->
        <div class="container login-page">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Merhaba!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <form id="myForm" class="signIn-form" method="POST" enctype="multipart/form-data">
                        <div class="d-flex flex-column">

                            <div class="input-group ">
                                <label class="form-label" for="usersName">Name</label>
                                <input class="form-control signIn-input" type="text" name="name" id="name" value="<?php echo $row['fullname'] ?>">
                            </div>
                            <div id="nameError" class="mb-3" style="color: red;"></div>

                            <div class="input-group ">
                                <label class="form-label" for="uid">Username</label>
                                <input class="form-control signIn-input" type="text" name="usernameid" id="username" value="<?php echo $row['username'] ?>">
                            </div>
                            <div id="usernameError" class="mb-3" style="color: red;"></div>
                            
                            <div class="input-group">
                                <label class="form-label" for="usersEmail">Email</label>
                                <input class="form-control signIn-input" type="email" name="email" id="email" value="<?php echo $row['email'] ?>">
                            </div>
                            <div id="emailError" class="mb-3" style="color: red;"></div>

                            <input type="hidden" name="id" id="" value="<?php echo $row['id'] ?>">
                            <div class="input-group mb-3">
                                <span>Upload a File:</span>
                                <input type="file" name="uploadedFile" id="uploadedFile" />
                            </div>

                            <img src="<?php echo $row['image'] ?>" alt="">
                            
                            <div class="input-group my-4">
                                <button class="giris-submit btn" type="submit" name="updateUser" value="UPDATE">Update</button>
                            </div>
                            <div id="success" style="color: green;"></div>

                        </div>
                    </form>
                                 
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!-- main body -->
    </div>
        
    <script>
       
    </script>
    <script>

        $(document).ready(function(){
            $('#myForm').submit(function(event) {
                $('#nameError').text(''); 
                $('#usernameError').text(''); 
                $('#emailError').text(''); 

                event.preventDefault();
                $("#overlay").show();
                var userid =  <?php echo $row['id'] ?>;
                var formData = {
                    id: userid,
                    name: $("#name").val(),
                    usernameid: $("#username").val(),
                    email: $("#email").val()
                };
                console.log(formData);
                // console.log("formData");
                $.ajax({
                    type: 'POST',
                    async: true,
                    cache: false,
                    dataType: 'json',
                    data: formData,
                    url: 'check.php',
                    beforeSend: function() {               
                    },
                    success: function(response) {
                        console.log(response);
                        if(response.status === 1){
                            $('#success').text(response.message['success']); 
                            $('#name').removeClass("red-border");
                            $('#username').removeClass("red-border");
                            $('#email').removeClass("red-border");
                        } else {
                            if (response.message['name'] != undefined) {
                                $('#nameError').text(response.message['name']); 
                                $('#name').addClass("red-border");
                            }

                            if (response.message['username'] != undefined) {
                                $('#usernameError').text(response.message['username']); 
                                $('#username').addClass("red-border");
                            }
                            
                            if (response.message['email'] != undefined) {
                                $('#emailError').text(response.message['email']); 
                                $('#email').addClass("red-border");
                            }
                            
                        }
                        setTimeout(function() {
                            $("#overlay").hide();
                        }, 1000);
                    },
                    complete: function() {    
                    },
                });
            });
        });
</script>

<?php include "layout/footer.php"; ?>





  






