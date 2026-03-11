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

echo "Sale Completed";

}
?>

<h2>POS / Sell Product</h2>

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
<input type="number" name="qty">

<br><br>

<button name="sell">Sell</button>

</form>