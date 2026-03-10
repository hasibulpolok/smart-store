<?php
include("../../config/db.php");
include("../../includes/header.php");
include("../../includes/sidebar.php");

$id = $_GET['id'];

$result = mysqli_query($conn,"SELECT * FROM categories WHERE id=$id");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

$name = $_POST['name'];

mysqli_query($conn,"UPDATE categories SET name='$name' WHERE id=$id");

header("Location:list.php");

}
?>

<div class="content">

<h2>Edit Category</h2>

<form method="post">

<div class="mb-3">
<label>Category Name</label>
<input type="text" name="name" class="form-control" value="<?php echo $row['name']; ?>">
</div>

<button class="btn btn-primary" name="update">Update</button>

</form>

</div>

<?php include("../../includes/footer.php"); ?>