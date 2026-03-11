<?php
include("../../config/db.php");

if(isset($_POST['save'])){

$name = $_POST['name'];
$category = $_POST['category'];
$purchase = $_POST['purchase_price'];
$sale = $_POST['sale_price'];
$stock = $_POST['stock'];

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

move_uploaded_file($tmp,"../../uploads/products/".$image);

mysqli_query($conn,"INSERT INTO products(name,category_id,purchase_price,sale_price,stock,image)
VALUES('$name','$category','$purchase','$sale','$stock','$image')");

echo "<p style='color:green'>Product Added Successfully</p>";

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Product</title>
</head>

<body>

<h2>Add Product</h2>

<form method="post" enctype="multipart/form-data">

Product Name <br>
<input type="text" name="name" required>
<br><br>

Category <br>
<select name="category">

<?php
$cat = mysqli_query($conn,"SELECT * FROM categories");

while($c = mysqli_fetch_assoc($cat)){
?>

<option value="<?php echo $c['id']; ?>">
<?php echo $c['name']; ?>
</option>

<?php } ?>

</select>

<br><br>

Purchase Price <br>
<input type="text" name="purchase_price">
<br><br>

Sale Price <br>
<input type="text" name="sale_price">
<br><br>

Stock <br>
<input type="text" name="stock">
<br><br>

Product Image <br>
<input type="file" name="image">
<br><br>

<button type="submit" name="save">Add Product</button>

</form>

</body>
</html>