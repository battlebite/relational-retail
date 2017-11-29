<?php require 'util.php' ?>
<?php require 'header.php' ?>
<div id="container">
	<?php
		$connection = getConnection();

		if($result = $connection->query("SELECT * FROM products ORDER BY category")){
			if($count = $result->num_rows){//If the query gives one or more rows 
				//echo '<p>', $count, '</p>'; //Show the amount of queries retrieved
				$i = 0;  
				while($rows = $result->fetch_assoc()){
					$tempName[$i] = $rows['name'];
					$tempPrice[$i] = $rows['price'];
					$tempImg[$i] = $rows['image_url'];
					$i = $i + 1;
				}
			}
		}
	?>
	<div id="category-select">
		<ul>
			<li>Sort By: </li>
			<li>ABC</li>
			<li>Price</li>
			<li>Category</li>
		</ul>
		<br>
	</div>
    <div id="content">
        <!-- Product Template -->
		<?php
			$i = 0;
			while($i < $count - 1){
				$i = $i + 1;

				echo '<div class="product-card">';
					echo '<img src="' . $tempImg[$i] . '">';
					echo '<h5>' . $tempName[$i] . '</h5>';
					echo '<p>' . $tempPrice[$i] . '<p>';
					echo '<button>Add to Cart</button>';
				echo '</div>';
			}
		?>

	</div>
</div>
<?php require 'footer.php' ?>