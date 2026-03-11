<?php
include("../../config/db.php");

if(isset($_POST['sell'])){

$product = $_POST['product'];
$qty = $_POST['qty'];

$p = mysqli_query($conn,"SELECT * FROM products WHERE id=$product");
$row = mysqli_fetch_assoc($p);

$price = $row['sale_price'];
$total = $price * $qty;

mysqli_query($conn,"INSERT INTO sales(product_id,qty,price,total)
VALUES('$product','$qty','$price','$total')");

// stock reduce
mysqli_query($conn,"UPDATE products SET stock = stock - $qty WHERE id=$product");

echo "<p style='color:green'>Sale Completed</p>";

}
?>

<!DOCTYPE html>
<html>
<head>
<title>POS Sales</title>
</head>

<body>

<h2>Sell Product (POS)</h2>

<form method="post">

Product <br>

<select name="product">

<?php

$p = mysqli_query($conn,"SELECT * FROM products");

while($r = mysqli_fetch_assoc($p)){

?>

<option value="<?php echo $r['id']; ?>">

<?php echo $r['name']; ?>

</option>

<?php } ?>

</select>

<br><br>

Quantity <br>

<input type="number" name="qty" required>

<br><br>

<button type="submit" name="sell">Sell Product</button>

</form>

</body>
</html>