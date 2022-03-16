<?php
session_start();
include "connect.php";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = mysqli_real_escape_string($con,$_POST['password']);
$email = $_POST['email'];
$tel  =$_POST['tel'];

// ENCODE PASSWORD
$pass = md5($password);

// INSERT DATA
$sql = "insert into member (fname,lname,email,tel,username,password,status) values ('$fname','$lname','$email','$tel','$username','$pass',1)";
if($con->query($sql)){
    $_SESSION['suc'] = "สมัครสมาชิกสำเร็จ";
    header("location:../../add_user.php");
}
else{
    $_SESSION['error'] = "สมัครสมาชิกไม่สำเร็จ " . $con->error;
    header("location:../../add_user.php");
}