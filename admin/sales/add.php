<?php
include("../../config/db.php");

if(isset($_POST['sell'])){

$product = $_POST['product'];
$qty = $_POST['qty'];
$price = $_POST['price'];
$total = $price * $qty;

mysqli_query($conn,"INSERT INTO sales(product_id,qty,price,total)
VALUES('$product','$qty','$price','$total')");

$sale_id = mysqli_insert_id($conn);

mysqli_query($conn,"UPDATE products SET stock = stock - $qty WHERE id=$product");

header("Location: invoice.php?id=".$sale_id);

}
?>

<!DOCTYPE html>
<html>
<head>

<title>POS Billing</title>

<script>

function getPrice(){

var select = document.getElementById("product");
var price = select.options[select.selectedIndex].getAttribute("data-price");

document.getElementById("price").value = price;

calculate();

}

function calculate(){

var price = document.getElementById("price").value;
var qty = document.getElementById("qty").value;

var total = price * qty;

document.getElementById("total").value = total;

}

</script>

</head>

<body>

<h2>POS System</h2>

<form method="post">

Product <br>

<select name="product" id="product" onchange="getPrice()">

<option value="">Select Product</option>

<?php

$p = mysqli_query($conn,"SELECT * FROM products");

while($r = mysqli_fetch_assoc($p)){

?>

<option value="<?php echo $r['id']; ?>" data-price="<?php echo $r['sale_price']; ?>">

<?php echo $r['name']; ?>

</option>

<?php } ?>

</select>

<br><br>

Price <br>
<input type="text" name="price" id="price" readonly>

<br><br>

Quantity <br>
<input type="number" name="qty" id="qty" onkeyup="calculate()">

<br><br>

Total <br>
<input type="text" id="total" readonly>

<br><br>

<button name="sell">Sell Product</button>

</form>

</body>
</html>