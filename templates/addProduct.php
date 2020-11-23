<h1>Add a Product</h1>



<?php
		$username = "root";
		$password = "";
		$database = "wp";

		$mysqli = new mysqli("localhost", $username, $password, $database);

		// Don't forget to properly escape your values before you send them to DB
		// to prevent SQL injection attacks.

		$product_title = $mysqli->real_escape_string($_POST['product_title']);
		$product_price = $mysqli->real_escape_string($_POST['product_price']);
		$product_new_price = $mysqli->real_escape_string($_POST['product_new_price']);
		$product_quantity = $mysqli->real_escape_string($_POST['product_quantity']);
		$product_stock = $mysqli->real_escape_string($_POST['product_stock']);
		$product_start_date = $mysqli->real_escape_string($_POST['product_start_date']);
		$product_end_date = $mysqli->real_escape_string($_POST['product_end_date']);
		$product_type = $mysqli->real_escape_string($_POST['product_type']);

		$query = "INSERT INTO wp_products (product_title, product_price, product_new_price ,product_quantity ,product_stock , product_start_date, product_end_date, product_type)
		            VALUES ('{$product_title}','{$product_price}','{$product_new_price}','{$product_quantity}','{$product_stock}' ,'{$product_start_date}' ,'{$product_end_date}' ,'{$product_type}')";

		$result = mysqli_query($mysqli , $query);
		
	?>

				<form method="post" action="options.php">
					<br><br>

  				<input type="text" id="product_title" name="product_title"  placeholder="Title" required><br><br>

  				
  				<input type="text" id="product_price" name="product_price" placeholder="Price"  required><br><br>

  				
  				<input type="text" id="product_new_price" name="product_new_price" placeholder="Promotional Price"  ><br><br>

  				
  				<input type="text" id="product_quantity" name="product_quantity" placeholder="Quantity"  required><br><br>

  				<p>Amount of stock:</p>
				  <input type="radio" id="yes" name="product_stock" value="yes">
				  <label for="yes">Yes</label><br>
				  <input type="radio" id="no" name="product_stock" value="no">
				  <label for="no">No</label><br><br>

				  
  				<input type="date" id="product_start_date" name="product_start_date" placeholder="Start Date"  ><br><br>

  				
  				<input type="date" id="product_end_date" name="product_end_date" placeholder="End Date"  ><br><br>

				<p>Select Type:</p>
  				<select  name="product_type" id="product_type" required>
				  <option value="product">Product</option>
				</select><br><br>

				<input type="submit" name="submit" />

			</form>