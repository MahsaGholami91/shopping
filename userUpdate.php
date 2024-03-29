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


<?php include "layout/header.php"; ?>
        <!-- main body -->
        
        <div class="container login-page">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Merhaba!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                    <form id="myForm" class="signIn-form" method="POST" enctype="multipart/form-data">
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
                            <input type="hidden" name="id" id="" value="<?php echo $_GET['id'] ?>">
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
        
    
    <script>
        $(document).ready(function(){
            $('#myForm').submit(function(event) {
                event.preventDefault();
                var formData = new FormData(this);
                // console.log("button clicked");

                $.ajax({
                    type: 'POST',
                    url: 'check.php',
                    data: formData,
                    dataType: 'json', 
                    contentType: false, 
                    processData: false,
                    success: function(response){
                        console.log('ssxsaxasxasx');
                        if (response.status == 1) {
                            alert(response.message);
                        };
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });
</script>

<?php include "layout/footer.php"; ?>





  






