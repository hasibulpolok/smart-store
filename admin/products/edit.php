<?php
include("../../config/db.php");

$id = $_GET['id'];

$data = mysqli_query($conn,"SELECT * FROM products WHERE id=$id");
$row = mysqli_fetch_assoc($data);

if(isset($_POST['update'])){

$name = $_POST['name'];
$category = $_POST['category'];
$purchase = $_POST['purchase_price'];
$sale = $_POST['sale_price'];
$stock = $_POST['stock'];

$image = $_FILES['image']['name'];
$tmp = $_FILES['image']['tmp_name'];

if($image!=""){
move_uploaded_file($tmp,"../../uploads/products/".$image);
}else{
$image = $row['image'];
}

mysqli_query($conn,"UPDATE products SET
name='$name',
category_id='$category',
purchase_price='$purchase',
sale_price='$sale',
stock='$stock',
image='$image'
WHERE id=$id");

echo "Product Updated Successfully";

}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Product</title>
</head>

<body>

<h2>Edit Product</h2>

<form method="post" enctype="multipart/form-data">

Product Name <br>
<input type="text" name="name" value="<?php echo $row['name']; ?>">
<br><br>

Category <br>

<select name="category">

<?php
$cat = mysqli_query($conn,"SELECT * FROM categories");

while($c = mysqli_fetch_assoc($cat)){
?>

<option value="<?php echo $c['id']; ?>"
<?php if($row['category_id']==$c['id']) echo "selected"; ?>>

<?php echo $c['name']; ?>

</option>

<?php } ?>

</select>

<br><br>

Purchase Price <br>
<input type="text" name="purchase_price" value="<?php echo $row['purchase_price']; ?>">
<br><br>

Sale Price <br>
<input type="text" name="sale_price" value="<?php echo $row['sale_price']; ?>">
<br><br>

Stock <br>
<input type="text" name="stock" value="<?php echo $row['stock']; ?>">
<br><br>

Current Image <br>
<img src="../../uploads/products/<?php echo $row['image']; ?>" width="80">
<br><br>

Change Image <br>
<input type="file" name="image">
<br><br>

<button name="update">Update Product</button>

</form>

</body>
</html>