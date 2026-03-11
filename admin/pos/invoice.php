<?php

include("../../config/db.php");

$sql="SELECT sales.*,products.name AS product
FROM sales
LEFT JOIN products
ON sales.product_id=products.id
ORDER BY sales.id DESC
LIMIT 10";

$result=mysqli_query($conn,$sql);

?>

<h2>Sales Invoice</h2>

<table border="1" cellpadding="10">

<tr>

<th>Product</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
<th>Customer</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['product']; ?></td>
<td><?php echo $row['qty']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['total']; ?></td>
<td><?php echo $row['customer']; ?></td>

</tr>

<?php } ?>

</table>

<br>

<button onclick="window.print()">Print Invoice</button>