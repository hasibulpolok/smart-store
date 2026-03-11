<?php
include("../../config/db.php");

$sql="SELECT * FROM cart";
$result=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($result)){

mysqli_query($conn,"INSERT INTO sales(product_id,qty,price,total)
VALUES('$row[product_id]','$row[qty]','$row[price]','$row[total]')");

mysqli_query($conn,"UPDATE products SET stock=stock-$row[qty]
WHERE id=$row[product_id]");

}

mysqli_query($conn,"DELETE FROM cart");

echo "Sale Completed";