<?php
session_start();
include "connect.php";
$p_id = $_GET['p_id'];

// DELETE DATA
$sql = "delete from stock where p_id = '$p_id'";
if($con->query($sql)){
    $sql = "delete from stock_in where p_id = '$p_id'";
    if($con->query($sql)){
        $_SESSION['suc'] = "ลบข้อมูลสินค้าสำเร็จ";
        header("location:../../view_stock.php");
    }
    else{
        $_SESSION['error'] = "ลบข้อมูลสินค้าสำเร็จ " . $con->error;
        header("location:../../view_stock.php");
    }
}