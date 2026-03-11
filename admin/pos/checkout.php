<?php

include("../../config/db.php");

$customer=$_POST['customer'];

$sql="SELECT * FROM cart";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

mysqli_query($conn,"INSERT INTO sales(product_id,qty,price,total,customer)
VALUES('$row[product_id]','$row[qty]','$row[price]','$row[total]','$customer')");

mysqli_query($conn,"UPDATE products SET stock=stock-$row[qty]
WHERE id=$row[product_id]");

}

mysqli_query($conn,"DELETE FROM cart");

header("Location:invoice.php");

?>