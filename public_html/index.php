<?php include 'header.php' ?>
<div id="container">
    <div id="content">
        <!-- Product Template -->
        <?php 
            $query = 'SELECT * FROM products';
            if ($stmt = $mysqli->prepare($query)) {

                /* execute statement */
                $stmt->execute();

                /* bind result variables */
                $stmt->bind_result($id, $name, $price, $quantity, $image_url, $description, $manufacturer, $category);

                /* fetch values */
                while ($stmt->fetch()) {
                    ?>
                    <div class="product-card">
                        <!-- Product Image -->
                        <img class="card-image" src="<?php echo $image_url ?>" alt="">
                        <!-- Product Name -->
                        <h5><?php echo $name ?></h5>
                        <!-- Price -->
                        <p>$<?php echo $price ?></p>
                        <?php 
                        if ($quantity == 0) echo "<span style='color: red'>Out of stock</span>";
                            else echo "<button>Ad to Cart</button>";
                            ?>
                        
                    </div>
                    <?php
                }

                /* close statement */
                $stmt->close();
                mysqli_close($mysqli);
            }
        ?>
    </div>
</div>
<?php include 'footer.php' ?>