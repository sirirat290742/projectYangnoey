<?php
session_start();
include "connect.php";

$p_id = rand();
$p_detail = $_POST['p_detail'];
$p_price = $_POST['p_price'];
$stock_in = $_POST['stock_in'];
$t = $_POST['type'];
if($stock_in == 0){
    $p_status = 0;
}
else{
    $p_status = 1;
}

    $image = $_FILES['file']['name'];
      $target = "uploads/".basename($image);
      if (move_uploaded_file($_FILES['file']['tmp_name'], $target)) {
         

           // INSERT DATA TO STOCK
           $sql = "insert into stock values('$p_id','$p_detail','$p_price','$p_status','$t','$image')";
           if($con->query($sql)){
               //INSERT DATA IN STOCK_IN
               $sql = "insert into stock_in values('$p_id','$stock_in',0)";
               if($con->query($sql)){
                   $_SESSION['suc'] = "เพิ่มข้อมูลรายการอาหารสำเร็จ";
                   header("location:../../add_product.php");
               }
               else{
                   $_SESSION['error'] = "ลบข้อมูลรายการอาหารสำเร็จ " . $con->error;
                   header("location:../../add_product.php");
               }
           }



    }else{
        $msg = "Failed to upload image";
    }


         





    
    