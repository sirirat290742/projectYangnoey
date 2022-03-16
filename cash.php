<?php
session_start();
include 'assets/php/connect.php';
?>


<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/console.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <title>ยินดีต้อนรับ</title>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar -->
    <!-- Page Content -->
    <div id="content">

        <div class="container my-4">
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <div class="header">
                        ชำระเงิน
                    </div>
                </div>
                <?php include 'assets/php/log.php'?>
            </div>
        </div>

        <div class="container my-4">
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <table class="table table-hover">
                        <thead class="table-bordered">
                            <tr  align="center">
                                <th>รายการ</th>
                                <th>จำนวน</th>
                                <th>การทำงาน</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php
                        
                            foreach ($_SESSION as $name => $value)
                            {
                                if(strcmp($name,"staff_id") != 0 && strcmp($name,"customer") != 0 && strcmp($name,"money") != 0 ){

                                $sql = "select * from stock where p_id = $name";
                                $load = $con->query($sql);
                                $data = $load->fetch_assoc();
                                
                                echo  "
                                <tr align='center'>
                                    <td>".$data['p_detail']."</td>
                                    <td>".$value."</td>
                                    <td><a  class='btn btn-danger' onClick=remove($name)>ลบ</a></td>
                                </tr>
                                ";
                                }

                                
                            }
                        ?>
                        
                    
                        </tbody>

                    </table>

                    <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1">จำนวนลูกค้า</label>
                        <input type="number" id='customer' min="1" class="form-control" onkeyup="myFunction()" data-bv-notempty="true" data-bv-notempty-message="ใส่จำนวนลูกค้า" placeholder="จำนวนลูกค้า">
                        <p id=c></p>
                        <label for="exampleInputEmail2">จำนวนเงินที่รับ</label>
                        <input type="number" id='money' min="1" class="form-control" data-bv-notempty="true" data-bv-notempty-message="ใส่จำนวนเงิน" placeholder="จำนวนเงินที่รับ">
                        
                    </div>
                    
                    <br>
                    <a id="ch" type="submit" onClick=pay() class="btn btn-primary">ชำระ</a>
                    </form>
                    
                </div>
            </div>
        </div>

    </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>




<?php
  
 
  if(isset($_REQUEST['t']) ) {
      $i = $_REQUEST['t'];
        if(isset($_SESSION["'$i'"])){
            unset($_SESSION["'$i'"]);
        }
        
    }


    if(isset($_REQUEST['j']) && isset($_REQUEST['k']) ){
        if($_REQUEST['k'] >= $_REQUEST['j']*199 ){
                    foreach ($_SESSION as $name => $value)
                {
                    
                    if(strcmp($name,"staff_id") != 0 && strcmp($name,"customer") != 0 && strcmp($name,"money") != 0){

                        $sql = "select * from stock_in where p_id = $name";
                        $load = $con->query($sql);
                        $data = $load->fetch_assoc();

                        $new_in = $data['stock_in']-$value;
                        $new_out = $data['stock_out']+$value;

                        $sql2 = "update stock_in set stock_in=$new_in,stock_out=$new_out where p_id = $name";
                        $load2 = $con->query($sql2);
                        

                        if($load2){
                            unset($_SESSION[$name]);
                        }

                                        
                    }
            }

        }
        $_SESSION['customer'] = $_REQUEST['j'];
            $_SESSION['money'] = $_REQUEST['k'];
        
}

  


?>

<script>

function remove(params) {
    
    $.post("cash.php", { t:params } ).done(function( data ){
        location.reload()
        })

}

function pay() {
    $cus = document.getElementById("customer").value;
    $mon = document.getElementById("money").value;
    $.post("cash.php", { j:$cus,k:$mon } ).done(function( data ){
        location.href="bill.php"
        })

    // location.href = "cash.php?j="+$cus+"&k="+$mon
}

function myFunction() {
    $cus = (document.getElementById("customer").value)*199;
    document.getElementById("c").innerHTML = "รวมทั้งหมดเป็นเงิน "+$cus+" บาท"
}

    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            // open or close navbar
            $('#sidebar').toggleClass('active');
            // close dropdowns
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
   
   });
</script>
</body>
</html>






  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>