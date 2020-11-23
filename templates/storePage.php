<h1>Store Page</h1>

<?php
		$username = "root";
		$password = "";
		$database = "wp";

		$mysqli = new mysqli("localhost", $username, $password, $database);


$query = "SELECT * FROM wp_products WHERE product_title != '' " ;
$result = mysqli_query($mysqli , $query);
 ?>

<!-- Display Results -->
<table >
  <thead>
    <tr >
      <th scope="col">Title</th>
      <th scope="col">Price</th>
      <th scope="col">Promotional Price </th>
      <th scope="col">Quantity</th>
      <th scope="col">Stock</th>
      <th scope="col">Start Promotional Date</th>
      <th scope="col">End Promotional Date</th>
      <th scope="col">Type</th>
    </tr>
  </thead>

<?php
while($row = mysqli_fetch_assoc($result)){
  $product_id = $row['product_id'];
  $product_title = $row['product_title'];
  $product_price = $row['product_price'];
  $product_new_price = $row['product_new_price'];
  $product_quantity = $row['product_quantity'];
  $product_stock = $row['product_stock'];
  $product_start_date = $row['product_start_date'];
  $product_end_date = $row['product_end_date'];
  $product_type = $row['product_type'];


?>

  <tbody>
    <tr>
     <td><?php echo $product_title ?></td>
     <td><?php echo $product_price ?></td>
     <td><?php echo $product_new_price ?></td>
     <td><?php echo $product_quantity ?></td>
     <td><?php echo $product_stock ?></td>
     <td><?php echo $product_start_date ?></td>
     <td><?php echo $product_end_date ?></td>
     <td><?php echo $product_type ?></td>
    </tr>
  </tbody>

  <?php
}
?>
</table>