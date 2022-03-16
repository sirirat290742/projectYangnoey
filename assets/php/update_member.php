<?php
session_start();
include "connect.php";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$password = mysqli_real_escape_string($con,$_POST['password']);
$email = $_POST['email'];
$tel  =$_POST['tel'];
$m_id = $_POST['m_id'];
// ENCODE PASSWORD
$pass = md5($password);

// update data
$sql = "update member set fname='$fname',lname='$lname',email='$email',tel='$tel',username='$username',password='$pass' where member_id='$m_id'";
if($con->query($sql)){
    $_SESSION['suc'] = "บันทึกข้อมูลสำเร็จ";
    header("location:../../edit_user.php?m_id=$m_id");
}
else{
    $_SESSION['error'] = "บันทึกข้อมูลสำเร็จไม่สำเร็จ " . $con->error;
    header("location:../../edit_user.php?m_id=$m_id");
}