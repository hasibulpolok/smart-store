<?php

session_start();

if(!isset($_SESSION['admin'])){
header("Location:login.php");
}

include("../config/db.php");

$product=mysqli_query($conn,"SELECT COUNT(*) AS total FROM products");
$p=mysqli_fetch_assoc($product);

$sales=mysqli_query($conn,"SELECT SUM(total) AS total FROM sales");
$s=mysqli_fetch_assoc($sales);

?>

<h2>Smart Store Admin Dashboard</h2>

<hr>

<h3>Total Products: <?php echo $p['total']; ?></h3>

<h3>Total Sales: <?php echo $s['total']; ?></h3>

<hr>

<a href="pos/index.php">POS System</a>

<br><br>

<a href="reports/daily.php">Daily Sales Report</a>

<br><br>

<a href="logout.php">Logout</a>