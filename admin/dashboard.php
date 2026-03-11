<?php
include("../config/db.php");

$product = mysqli_query($conn,"SELECT COUNT(*) AS total FROM products");
$p = mysqli_fetch_assoc($product);

$sales = mysqli_query($conn,"SELECT SUM(total) AS total FROM sales");
$s = mysqli_fetch_assoc($sales);

$stock = mysqli_query($conn,"SELECT COUNT(*) AS low FROM products WHERE stock < 5");
$l = mysqli_fetch_assoc($stock);

?>

<!DOCTYPE html>
<html>
<head>

<title>Admin Dashboard</title>

<style>

.box{
width:200px;
padding:20px;
margin:20px;
background:#f2f2f2;
display:inline-block;
text-align:center;
font-size:18px;
}

</style>

</head>

<body>

<h2>Smart Store Dashboard</h2>

<div class="box">

<h3>Total Products</h3>

<?php echo $p['total']; ?>

</div>

<div class="box">

<h3>Total Sales</h3>

<?php echo $s['total']; ?>

</div>

<div class="box">

<h3>Low Stock</h3>

<?php echo $l['low']; ?>

</div>

</body>
</html>