<?php
include("../../config/db.php");

$id = $_GET['id'];

$sql = "SELECT sales.*, products.name AS product
FROM sales
LEFT JOIN products
ON sales.product_id = products.id
WHERE sales.id=$id";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html>
<head>

<title>Invoice</title>

<style>

body{
font-family:Arial;
}

.invoice{
width:300px;
margin:auto;
border:1px solid black;
padding:20px;
}

table{
width:100%;
}

</style>

</head>

<body>

<div class="invoice">

<h3 align="center">SMART STORE</h3>

<p align="center">Sales Invoice</p>

<hr>

<table>

<tr>
<td>Product</td>
<td><?php echo $row['product']; ?></td>
</tr>

<tr>
<td>Price</td>
<td><?php echo $row['price']; ?></td>
</tr>

<tr>
<td>Quantity</td>
<td><?php echo $row['qty']; ?></td>
</tr>

<tr>
<td>Total</td>
<td><?php echo $row['total']; ?></td>
</tr>

<tr>
<td>Date</td>
<td><?php echo $row['date']; ?></td>
</tr>

</table>

<hr>

<button onclick="window.print()">Print Invoice</button>

</div>

</body>
</html>