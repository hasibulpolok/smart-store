<?php
include("../../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>

<title>Product List</title>

<style>
table{
border-collapse: collapse;
width: 100%;
}

th,td{
border:1px solid black;
padding:10px;
text-align:center;
}

img{
width:60px;
}

</style>

</head>

<body>

<h2>Product List</h2>

<a href="add.php">Add Product</a>

<br><br>

<table>

<tr>

<th>ID</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Image</th>
<th>Action</th>

</tr>

<?php

$sql = "SELECT products.*, categories.name AS category
FROM products
LEFT JOIN categories
ON products.category_id = categories.id";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['name']; ?></td>

<td><?php echo $row['category']; ?></td>

<td><?php echo $row['sale_price']; ?></td>

<td><?php echo $row['stock']; ?></td>

<td>

<img src="../../uploads/products/<?php echo $row['image']; ?>">

</td>

<td>

<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>