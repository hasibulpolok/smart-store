<?php
include("../../config/db.php");
?>

<!DOCTYPE html>
<html>
<head>

<title>POS System</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container-fluid">

<div class="row">

<!-- Product List -->

<div class="col-md-8">

<h3>Products</h3>

<div class="row">

<?php

$p = mysqli_query($conn,"SELECT * FROM products");

while($row=mysqli_fetch_assoc($p)){
?>

<div class="col-md-3">

<div class="card mb-3">

<div class="card-body text-center">

<h6><?php echo $row['name']; ?></h6>

<p>Price: <?php echo $row['sale_price']; ?></p>

<form action="add_cart.php" method="post">

<input type="hidden" name="product" value="<?php echo $row['id']; ?>">

<input type="number" name="qty" value="1" class="form-control mb-2">

<button class="btn btn-primary btn-sm">Add</button>

</form>

</div>

</div>

</div>

<?php } ?>

</div>

</div>

<!-- Cart -->

<div class="col-md-4">

<h3>Cart</h3>

<table class="table table-bordered">

<tr>
<th>Product</th>
<th>Qty</th>
<th>Total</th>
<th></th>
</tr>

<?php

$sql="SELECT cart.*,products.name AS product
FROM cart
LEFT JOIN products
ON cart.product_id=products.id";

$result=mysqli_query($conn,$sql);

$total=0;

while($r=mysqli_fetch_assoc($result)){

$total += $r['total'];

?>

<tr>

<td><?php echo $r['product']; ?></td>
<td><?php echo $r['qty']; ?></td>
<td><?php echo $r['total']; ?></td>

<td>
<a href="remove_cart.php?id=<?php echo $r['id']; ?>" class="btn btn-danger btn-sm">X</a>
</td>

</tr>

<?php } ?>

</table>

<h4>Total: <?php echo $total; ?></h4>

<form action="checkout.php" method="post">

<input type="text" name="customer" class="form-control mb-2" placeholder="Customer Name">

<button class="btn btn-success w-100">Checkout</button>

</form>

</div>

</div>

</div>

</body>
</html>