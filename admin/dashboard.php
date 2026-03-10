<?php
session_start();

if(!isset($_SESSION['user_id'])){
header("Location: ../login.php");
}
?>

<?php include("../includes/header.php"); ?>

<?php include("../includes/sidebar.php"); ?>

<div class="content">

<h2>Dashboard</h2>

<div class="row">

<div class="col-md-3">
<div class="card bg-primary text-white">
<div class="card-body">
<h5>Total Products</h5>
<h3>120</h3>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white">
<div class="card-body">
<h5>Total Sales</h5>
<h3>$5000</h3>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning text-white">
<div class="card-body">
<h5>Customers</h5>
<h3>85</h3>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-danger text-white">
<div class="card-body">
<h5>Low Stock</h5>
<h3>5</h3>
</div>
</div>
</div>

</div>

</div>

<?php include("../includes/footer.php"); ?>