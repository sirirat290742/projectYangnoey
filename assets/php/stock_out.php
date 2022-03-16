<?php
session_start();
include "connect.php";
$p_id = $_POST['p_id'];
$stock = $_POST['stock_out'];

// CHECK PRESENT STOCK
$sql = "select stock_in,stock_out from stock_in where p_id='$p_id'";
$load= $con->query($sql);
$total = 0;
$stock_in = 0;
$chk = false;
if($data = $load->fetch_assoc()) {
    if($data['stock_in'] > $stock){
        $present = $data['stock_out'];
        // CAL NEW PRESENT STOCK_OUT
        $total = $stock + $present;
        // CAL NEW PRESENT STOCK_IN
        $stock_in = $data['stock_in'] - $stock;
    }
    else{
        $chk = true;
        $_SESSION['error'] = "จำนวนสินค้าในคลังมีไม่พอ กรุณาเบิกสต็อกสินค้าก่อน " . $con->error;
        header("location:../../add_stock.php");
    }
}

// UPDATE NEW STOCK DATA
if($chk === false){
    $sql ="update stock_in set stock_in='$stock_in', stock_out='$total' where p_id = '$p_id'";
    if($con->query($sql)){
        $_SESSION['suc'] = "บันทึกข้อมูลสำเร็จ";
        header("location:../../add_stock.php");
    }
    else{
        $_SESSION['error'] = "บันทึกข้อมูลไม่สำเร็จ " . $con->error;
        header("location:../../add_stock.php");
    }
}