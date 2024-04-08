<?php   include "layout/header.php"; 
        include "includes/db.inc.php";
?>

<!-- main body -->
    <div class="container login-page">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h1>Product List!</h1>
                <table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">Category</th>
            <th class="">Product Name</th>
            <th class="">Product Title</th>
            <th class="">Product Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $query = "SELECT product.*, category.name AS category_name FROM product JOIN category ON product.catId = category.id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            $data = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $categoryName = $row['category_name'];
                unset($row['category_name']);
                $data[$categoryName][] = $row;
            }

            foreach ($data as $categoryName => $categoryData) {
                echo "<tr><td rowspan='" . count($categoryData) . "'>$categoryName</td>";
                foreach ($categoryData as $item) {
                    echo "<td>{$item['name']}</td>";
                    echo "<td>{$item['title']}</td>";
                    echo "<td>{$item['price']}</td></tr>";
                }
            }
        } else {
            echo "<tr><td colspan='4'>Error: " . mysqli_error($conn) . "</td></tr>";
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



  