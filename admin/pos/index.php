<?php
include("../../config/db.php");
?>

<h2>POS System</h2>

<form action="add_cart.php" method="post">

Product

<select name="product">

<?php

$p = mysqli_query($conn,"SELECT * FROM products");

while($row=mysqli_fetch_assoc($p)){
?>

<option value="<?php echo $row['id']; ?>">
<?php echo $row['name']; ?>
</option>

<?php } ?>

</select>

Quantity
<input type="number" name="qty" required>

<button>Add to Cart</button>

</form>

<hr>

<h3>Cart Items</h3>

<table border="1" cellpadding="10">

<tr>
<th>Product</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
<th>Action</th>
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
<td><?php echo $r['price']; ?></td>
<td><?php echo $r['total']; ?></td>

<td>
<a href="remove_cart.php?id=<?php echo $r['id']; ?>">Remove</a>
</td>

</tr>

<?php } ?>

</table>

<h3>Grand Total: <?php echo $total; ?></h3>

<br>

<form action="checkout.php" method="post">

Customer Name
<input type="text" name="customer" required>

<br><br>

<button>Checkout</button>

</form>