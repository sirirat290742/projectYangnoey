<?php
session_start();
include "connect.php";
$m_id = $_GET['m_id'];

// DELETE DATA
$sql = "delete from member where member_id = '$m_id'";
if($con->query($sql)){
    $_SESSION['suc'] = "ลบข้อมูลสมาชิกสำเร็จ";
    header("location:../../view_user.php");
}
else{
    $_SESSION['error'] = "ลบข้อมูลสมาชิกไม่สำเร็จ " . $con->error;
    header("location:../../view_user.php");
}