<?php

include("../../config/db.php");

$today=date("Y-m-d");

$sql="SELECT sales.*,products.name AS product
FROM sales
LEFT JOIN products
ON sales.product_id=products.id
WHERE DATE(date)='$today'";

$result=mysqli_query($conn,$sql);

$total=0;

?>

<h2>Daily Sales Report</h2>

<table border="1" cellpadding="10">

<tr>

<th>Product</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>

</tr>

<?php

while($row=mysqli_fetch_assoc($result)){

$total += $row['total'];

?>

<tr>

<td><?php echo $row['product']; ?></td>
<td><?php echo $row['qty']; ?></td>
<td><?php echo $row['price']; ?></td>
<td><?php echo $row['total']; ?></td>

</tr>

<?php } ?>

</table>

<h3>Total Sales Today: <?php echo $total; ?></h3>