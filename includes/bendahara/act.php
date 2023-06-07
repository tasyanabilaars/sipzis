<?php
session_start();

$username = $_POST['username'];
$password= $_POST['password'];

$conn = mysqli_connect("localhost", "root", "", "db_sipzis");
$query = "SELECT * FROM user where username='$username' && password='$password'";
$login = mysqli_query($conn, $query);
$isLogin = mysqli_num_rows($login);

if (isset($_POST['submit'])) {
    if ($isLogin == 1 ){
        $_SESSION['user'] = $username;
        header ("Location: index.php");
    }

    else {
        $msg = "<p class='alert alert-danger' role='alert'>Username / Password Salah</p>";
        header("Location: login.php?msg=$msg");
    }
} 
?>