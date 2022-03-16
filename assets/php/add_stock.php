<?php
session_start();
include "connect.php";
$p_id = $_POST['p_id'];
$stock = $_POST['stock_in'];

// CHECK PRESENT STOCK
$sql = "select stock_in from stock_in where p_id='$p_id'";
$load= $con->query($sql);
if($data = $load->fetch_assoc()) $present = $data['stock_in'];

// CAL NEW PRESENT STOCK
$total = $stock + $present;

// UPDATE NEW STOCK DATA
$sql ="update stock_in set stock_in='$total' where p_id = '$p_id'";
if($con->query($sql)){
    $_SESSION['suc'] = "บันทึกข้อมูลสำเร็จ";
    header("location:../../stock_in.php");
}
else{
    $_SESSION['error'] = "บันทึกข้อมูลไม่สำเร็จ " . $con->error;
    header("location:../../stock_in.php");
}