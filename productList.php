<?php include "layout/header.php"; 





?>
    <!-- main body -->
    <div class="container login-page">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <?php 
                    include "includes/db.inc.php";
                ?>
                <h1>Product List!</h1>

                <table class="table table-hover table-bordered table-striped">
                <?php 
                    $products = array(
                        "electronics" => array("TV", "Laptop", "Smartphone"),
                        "clothing" => array("T-Shirt", "Jeans", "Jacket"),
                        "books" => array("Fiction", "Non-Fiction"),
                    );
                    
                    foreach ($products as $category => $items) {
                        // echo $category;
                ?>
                    <thead>
                        <tr>
                            <th class="text-center"><?php echo $category ?></th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        <tr>
                        <?php foreach ($items as $item) { 
                            // echo $item;
                            
                            ?>
                            <td><?php echo $item; ?></td>
                        </tr>
                            <?php
                                    }
                                }
                            ?>
                    </tbody>
                </table>
                
                    
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <!-- main body -->
</div>

<?php include "layout/footer.php"; ?>



  