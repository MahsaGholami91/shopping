<?php 
include "layout/header.php"; 


?>
        <!-- main body -->
        <div class="container login-page">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Create a Product!</h1>
                    <form id="myForm" class="signIn-form" action="includes/product.inc.php" method="POST" enctype="multipart/form-data">
                        <div class="d-flex flex-column">

                            <div class="input-group ">
                                <label class="form-label" for="productName">Name</label>
                                <input class="form-control signIn-input" type="text" name="productname" id="pName" value="<?php echo $row['name'] ?>">
                            </div>
                            <div id="pNameError" class="mb-3" style="color: red;"></div>

                            <div class="input-group ">
                                <label class="form-label" for="productTitle">Title</label>
                                <input class="form-control signIn-input" type="text" name="productTitle" id="pTitle" value="<?php echo $row['title'] ?>">
                            </div>
                            <div id="pTitleError" class="mb-3" style="color: red;"></div>
                            
                            <div class="input-group ">
                                <label class="form-label" for="productDesc">Description</label>
                                <textarea class="form-control signIn-input" name="productDesc" id="pDescription" value="<?php echo $row['description'] ?>" cols="30" rows="10"></textarea>
                            </div>
                            <div id="pDescriptionError" class="mb-3" style="color: red;"></div>

                            <div class="input-group">
                                <label class="form-label" for="productPrice">Price</label>
                                <input class="form-control signIn-input" type="text" name="productPrice" id="pPrice" value="<?php echo $row['price'] ?>">
                            </div>
                            <div id="pPriceError" class="mb-3" style="color: red;"></div>

                            <div class="input-group">
                                <label class="form-label" for="productDisc">Discount</label>
                                <input class="form-control signIn-input" type="text" name="productDisc" id="pDiscount" value="<?php echo $row['discount'] ?>">
                            </div>
                            <div id="pDiscountError" class="mb-3" style="color: red;"></div>

                            <div class="input-group">
                                <label class="form-label" for="productColor">Color</label>
                                <input type="color" name="productColor" id="pColor" value="<?php echo $row['color'] ?>">                            
                            </div>
                            <div id="pColorError" class="mb-3" style="color: red;"></div>

                            <div class="input-group mb-3">
                                <span>Upload a Product Image:</span>
                                <input type="file" name="uploadedFile" id="uploadedFile" />
                                <img src="<?php echo $row['image'] ?>" alt="">
                            </div>

                            
                            <div class="input-group my-4">
                                <button class="giris-submit btn" type="submit" name="createProduct" value="CREATE">CREATE</button>
                            </div>
                            <div id="success" style="color: green;"></div>
                            <div id="auth" style="color: blue;"></div>

                        </div>
                    </form>
       
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
        <!-- main body -->
    </div>
        

    <!-- <script>

        $(document).ready(function(){
            $('#myForm').submit(function(event) {
                $('#nameError').text(''); 
                $('#usernameError').text(''); 
                $('#emailError').text(''); 

                event.preventDefault();
                $("#overlay").show();
                var userid =  '<?php echo $row['id'] ?>';
                var formData = {
                    id: userid,
                    name: $("#name").val(),
                    usernameid: $("#username").val(),
                    email: $("#email").val(),
                    hidden: $("#userid").val()
                };
                
                var loggedInUserId = <?php echo $result['id'] ?>;
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
                        if (formData['hidden'] != loggedInUserId) {
                            console.log(response.message);
                            $('#auth').text(response['message']['auth']); 
                        }
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
</script> -->

<?php include "layout/footer.php"; ?>





  






