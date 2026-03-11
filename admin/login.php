<?php
session_start();
include("../config/db.php");

if(isset($_POST['login'])){

$user = $_POST['username'];
$pass = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$user' AND password='$pass'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

$_SESSION['admin']=$user;

header("Location:dashboard.php");

}else{

echo "Login Failed";

}

}
?>

<h2>Admin Login</h2>

<form method="post">

Username
<input type="text" name="username">

<br><br>

Password
<input type="password" name="password">

<br><br>

<button name="login">Login</button>

</form>