<?php 
include "layout/header.php"; 
include "includes/db.inc.php";



?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>

        <!-- main body -->
        <div class="container login-page">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1>Create a Product!</h1>
                    <form id="myForm" class="signIn-form" action="process.php" method="POST" enctype="multipart/form-data">
                        <div class="d-flex flex-column">

                            <div class="input-group ">
                                <label class="form-label" for="productName">Name</label>
                                <input class="form-control signIn-input" type="text" name="productname" id="pName" value="<?php echo $row['name'] ?>">
                            </div>
                            <div id="pNameError" class="mb-3" style="color: red;"></div>

                            <div class="input-group " >
                                <label class="form-label" for="productName">Category</label>
                                <select name="category" class="form-control signIn-input">
                                    <option value="Select Category" selected>Select Category</option>
                                    <?php 
                                        $categories = "SELECT * FROM category";
                                        $result = mysqli_query($conn,$categories);
                                        while($row = mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name']?></option>
                                        <?php  } ?>
                                </select>
                            </div>
                            <div id="pColorError" class="mb-3" style="color: red;"></div> 

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

                          

                            <div class="input-group mb-3" >
                                <div id="dropzone" class="dropzone" style="width: 100%;"></div>
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
        
<?php include "layout/footer.php"; ?>

<script>
    // Initialize Dropzone
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#dropzone", {
        url: "process.php",
        paramName: "file",
        maxFilesize: 10, // MB
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        addRemoveLinks: true,
        dictDefaultMessage: "Drop files here or click to upload",
        dictRemoveFile: "Remove",
        success: function(file, response) {
            $('#success').text(response);
        },
        error: function(file, errorMessage) {
            $('#error').text(errorMessage);
        }
    });
</script>






  






