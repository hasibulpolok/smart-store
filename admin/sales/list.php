<?php
include("../../config/db.php");

$sql = "SELECT sales.*, products.name AS product
FROM sales
LEFT JOIN products
ON sales.product_id = products.id";

$result = mysqli_query($conn,$sql);
?>

<h2>Sales List</h2>

<table border="1" cellpadding="10">

<tr>

<th>ID</th>
<th>Product</th>
<th>Quantity</th>
<th>Price</th>
<th>Total</th>
<th>Date</th>

</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['product']; ?></td>
<td><?php echo $row['qty']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['total']; ?></td>
<td><?php echo $row['date']; ?></td>

</tr>

<?php } ?>

</table>