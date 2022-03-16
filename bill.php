<?php
session_start();
include 'assets/php/connect.php';

$cost = $_SESSION['customer']*199;
$cc = $_SESSION['customer'];
$input_money = $_SESSION['money'];
if($input_money < $cost){
    echo "<script>alert('เงินไม่พอ')
    window.history.back()
    </script>";

}


?>

<html lang="en">
<head>
  <title>Bill</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
 
<div class="container">
  <h2>ใบเสร็จ</h2>
  <div class="card">
    <div class="card-header">
        <table class="table table-hover">
            <thead class="table-bordered">
                <tr  align="center">
                    <th>เลขที่คำสั่งซื้อ</th>
                    <th><?php $id = rand(999,99999999);echo $id;?></th>
                </tr>

                <tr  align="center">
                    <th>ชื่อพนักงานรับเงิน</th>
                    <th><?php 
                        $s = $_SESSION['staff_id'];
                        $sql = "select * from staff where staff_id = $s";
                        $load = $con->query($sql);
                        $data = $load->fetch_assoc();
                        $staff_name = $data['fname'];
                        echo $staff_name;
                    ?></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
    <div class="card-body">
    
    
            <table class="table table-hover">
                <thead class="table-bordered">
                    
                </thead>
                <tbody>

                <tr  align="center">
                        <td>จำนวนลูกค้า</td>
                        <td><?php $count_customer = $_SESSION['customer'];echo $count_customer;?> คน</td>
                    </tr>

                    <tr  align="center">
                        <td>จำนวนเงินทั้งหมด</td>
                        <td><?php 
                            echo $cost;
                        ?> บาท</td>
                    </tr>
                    <tr  align="center">
                        <td>จำนวนเงินที่รับ</td>
                        <td><?php 
                            echo $input_money;
                        ?> บาท</td>
                    </tr>
                    <tr  align="center">
                        <td>จำนวนเงินทอน</td>
                        <td><?php
                            $balance = $input_money-$cost; 
                            echo $balance;
                        ?> บาท</td>
                    </tr>


                </tbody>
            </table>

    </div> 
  </div>
</div>

</body>
</html>

<?php
$d = date("Y-m-d");
$sql = "insert into `orders`(`staff_id`, `bill_id`, `staff_name`, `dates`, `Amount_received`, `customers`, `Total_price`, `Shorten`) values 
($s,$id,'".$staff_name."','".$d."',$input_money,$cc,$cost,$balance)";

$load = $con->query($sql);


?>

<button class="btn btn-success" style="float:right" onClick="back()">กลับหน้าหลัก</button>
<script>
function back() {
    window.location.href="index_order.php"
}
</script>