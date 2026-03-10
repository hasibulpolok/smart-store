<?php
include("../../config/db.php");

$result = mysqli_query($conn,"
SELECT products.*, categories.name AS category
FROM products
LEFT JOIN categories
ON products.category_id = categories.id
");
?>

<h2>Product List</h2>

<a href="add.php">Add Product</a>

<br><br>

<table border="1" cellpadding="10">

<tr>
<th>ID</th>
<th>Name</th>
<th>Category</th>
<th>Price</th>
<th>Stock</th>
<th>Image</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['sale_price']; ?></td>
<td><?php echo $row['stock']; ?></td>

<td>
<img src="../../uploads/products/<?php echo $row['image']; ?>" width="60">
</td>

<td>
<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
</td>

</tr>

<?php } ?>

</table>