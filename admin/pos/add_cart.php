<?php
include("../../config/db.php");

$product=$_POST['product'];
$qty=$_POST['qty'];

$p=mysqli_query($conn,"SELECT * FROM products WHERE id=$product");
$row=mysqli_fetch_assoc($p);

$price=$row['sale_price'];
$total=$price*$qty;

mysqli_query($conn,"INSERT INTO cart(product_id,qty,price,total)
VALUES('$product','$qty','$price','$total')");

header("Location:index.php");