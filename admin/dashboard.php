<?php
session_start();

if(!isset($_SESSION['user_id'])){
    header("Location: ../login.php");
}
?>

<h1>Dashboard</h1>

Welcome <?php echo $_SESSION['name']; ?>

<br><br>

<a href="../logout.php">Logout</a>