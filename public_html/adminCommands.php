<?php
include 'header.php' ;
if (!isset($_SESSION['is_admin'])) {
  header('Location: index.php');
}
if (!isset($_SESSION['form_error'])) {
    $_SESSION['form_error'] = "";
}
if (!isset($_SESSION['form_success'])) {
    $_SESSION['form_success'] = "";
}
?>
<div id="container">
    <div id="content">
        <span><?php echo $_SESSION['form_success']?></span>
        <div>
            <h2>Add Item</h2>
            <form action="addProduct.php" method="post">
                <span style="color:red"><?php echo $_SESSION['form_error'] ?></span>
                <input type="text" name="name" placeholder="Product Name">
                <input type="text" name="price" placeholder="Price">
                <input type="text" name="quantity" placeholder="Quantity">
                <!-- File upload (image) -->
                <!-- TODO -->
                <input type="file" name="fileToUpload" id="fileToUpload">
                <input type="text" name="description" placeholder="Description">
                <select name="manufacturer">
                    <?php 
                        $query = 'SELECT name from manufacturers';
                        if ($stmt = $mysqli->prepare($query)) {
                            $stmt->execute();
                            $stmt->bind_result($name);
                            while ($stmt->fetch()) {
                                echo "<option value='$name'>$name</option>";
                            }
                            $stmt->close();
                        }
                     ?>
                </select>
                <select name="category">
                    <option value="game">Game</option>
                    <option value="console">Console</option>
                </select>
                <input type="submit" value="Add Item">
            </form>
        </div>
        <br>
        <div>
            <h2>Delete Item</h2>
            <form action="removeProduct.php" method="post">
                <select name="pid">
                    <?php
                        $query = 'SELECT id, name FROM products';
                        if ($stmt = $mysqli->prepare($query)) {
                            /* execute statement */
                            $stmt->execute();
                            /* bind result variables */
                            $stmt->bind_result($id, $name);
                            /* fetch values */
                            while ($stmt->fetch()) {
                                echo "<option value='$id'>$name</option>";
                            }
                            /* close statement */
                            $stmt->close();
                        }
                    ?>
                </select>
                <input type="submit" value="Delete">
            </form>
        </div>
        <br>
        <div>
            <h2>Change Quantity</h2>
            <form action="updateProduct.php" method="post">
                <select name="pid">
                    <?php
                        $query = 'SELECT id, name FROM products';
                        if ($stmt = $mysqli->prepare($query)) {
                            /* execute statement */
                            $stmt->execute();
                            /* bind result variables */
                            $stmt->bind_result($id, $name);
                            /* fetch values */
                            while ($stmt->fetch()) {
                                echo "<option value='$id'>$name</option>";
                            }
                            /* close statement */
                            $stmt->close();
                        }
                    ?>
                </select>
                <select name="action">
                    <option value="add">Add</option>
                    <option value="delete">Remove</option>
                    <option value="set">Set To</option>
                </select>
                <input type="number" name="value">
                <input type="submit" value="Change Quantity">
            </form>
        </div>
    </div>
</div>
<?php 
include 'footer.php';
$_SESSION['form_error'] = "";
$_SESSION['form_success'] = "";
?>