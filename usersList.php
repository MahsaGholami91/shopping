<?php include "header.php"; ?>

        <!-- main body -->
        <div class="container login-page">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <?php 
                        include "includes/db.inc.php";
                    ?>
                    <h1>Merhaba!</h1>
                    <p>Lorem ipsum dolor sit amet consectetur.</p>

                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $sql = "SELECT * FROM users ";
                                $result = mysqli_query($conn,$sql);
                                if(!$result){
                                    die("query failed");
                                }
                                else{
                                    while($row = mysqli_fetch_assoc($result)){
                                        ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['fullname']; ?></td>
                                        <td><?php echo $row['username']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                       
                                        <td><a href="userUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                                        <td><a href="userDelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
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
 
    <?php include "footer.php"; ?>



  