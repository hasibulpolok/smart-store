<?php
session_start();
include("config/db.php");

if(isset($_POST['login'])){

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users 
        WHERE email='$email' AND password='$password'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result) == 1){

$row = mysqli_fetch_assoc($result);

$_SESSION['user_id'] = $row['id'];
$_SESSION['name'] = $row['name'];

header("Location: admin/dashboard.php");

}else{
echo "Invalid Email or Password";
}

}
?>

<form method="post">

<h2>Login</h2>

Email <br>
<input type="text" name="email"><br><br>

Password <br>
<input type="password" name="password"><br><br>

<button name="login">Login</button>

</form>