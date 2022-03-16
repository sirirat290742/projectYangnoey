<?php
session_start();
include'connect.php';
$p_id = $_POST['p_id'];
$p_detail = $_POST['p_detail'];
$price=  $_POST['p_price'];

// UPDATE
$sql = "update stock set p_detail='$p_detail',p_price='$price' where p_id='$p_id'";
if($con->query($sql)){
    $_SESSION['suc'] = "บันทึกข้อมูลสำเร็จ";
    header("location:../../edit_product.php?m_id=$p_id");
}
else{
    $_SESSION['error'] = "บันทึกข้อมูลสำเร็จไม่สำเร็จ " . $con->error;
    header("location:../../edit_product.php?m_id=$p_id");
}