<?php
include("../../config/db.php");
include("../../includes/header.php");
include("../../includes/sidebar.php");

$result = mysqli_query($conn,"SELECT * FROM categories");
?>

<div class="content">

<h2>Category List</h2>

<a href="add.php" class="btn btn-primary mb-3">Add Category</a>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Name</th>
<th>Action</th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result)){
?>

<tr>

<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>

<a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>

</td>

</tr>

<?php } ?>

</table>

</div>

<?php include("../../includes/footer.php"); ?>