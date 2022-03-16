<?php
session_start();
include 'assets/php/connect.php';
if(!isset($_SESSION['staff_id'])) header("location:index.php");

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



<!-- DROPDOWN
<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">DASHBOARD</a>
<ul class="collapse list-unstyled" id="homeSubmenu">
    <li>
        <a href="#">Home 1</a>
    </li>
    <li>
        <a href="#">Home 2</a>
    </li>
    <li>
        <a href="#">Home 3</a>
    </li>
</ul>
-->

<div class="wrapper">
    <!-- Sidebar -->
    <?php include 'assets/object/sidebar.php'?>
    <!-- Page Content -->
    <div id="content">
        <?php include 'assets/object/navbar.php'?>

        <div class="container my-4">
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <div class="header">
                        เบิกสต็อกสินค้า
                    </div>
                </div>
                <?php include 'assets/php/log.php'?>
            </div>
            <form action="assets/php/register.php" method="post">
                <div class="row my-4" style="padding: 50px">
                    <div class="mb-3 col-lg-6">
                        <label for="fname" class="form-label">กรุณาเลือกสินค้าที่ต้องการ</label>
                        <select name="p_id" id="p_id" class="form-select" onchange="changeFunc();">
                            <option value="">--กรุณาเลือกรายการอาหาร--</option>
                            <?php
                            // LOAD STOCK DATA
                            $sql = "select * from stock";
                            $load = $con->query($sql);
                            while($data = $load->fetch_assoc()):
                            ?>
                                <option value="<?php echo $data['p_id'] ?>"><?php echo $data['p_detail'] ?></option>
                            <?php
                            endwhile;
                            if(!isset($_GET['p_id'])){
                                header("location:stock_in.php?p_id=.".$data['p_id']."");
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>

        <?php
        if(isset($_GET['p_id'])):
        ?>
        <div class="container">
            <div class="row" style="padding: 0px 50px">
               <div class="mb-3 col-lg-12">
                   <div class="round-container">
                       <div class="round-header">
                           เบิกสต็อกสินค้าของรายการรหัส <?php echo $_GET['p_id'] ?>
                       </div>
                       <div class="round-content">
                           <form action="assets/php/add_stock.php" method="post">
                               <div class="row">
                                   <?php
                                   $sql ="SELECT * FROM stock where p_id = '".$_GET['p_id']."'";
                                   $load = $con->query($sql);
                                   if($data = $load->fetch_assoc()):
                                       // LOAD STOCK IN
                                       $ssql = "select stock_in from stock_in where p_id = '".$_GET['p_id']."'";
                                        $sload = $con->query($ssql);
                                        if($rs = $sload->fetch_assoc()):
                                   ?>
                                    <div class="mb-3 col-lg-12">
                                        <label class="form-label">จำนวนสินค้าในคลังปัจจุบัน</label>
                                        <input type="text" class="form-control" readonly value="<?php echo $rs['stock_in'] ?>">
                                    </div>
                                       <div class="mb-3 col-lg-8">
                                           <label class="form-label">กรุณาใส่ตัวเลขเพื่อเบิกสินค้า</label>
                                           <input type="number" class="form-control" name="stock_in">
                                       </div>
                                        <div class="mb-3 col-lg-4">
                                            <label class="form-label">บันทึกข้อมูล</label>
                                            <input type="text" name="p_id" value="<?php echo $_GET['p_id'] ?>" hidden>
                                            <button class="btn btn-success form-control" type="submit">บันทึกข้อมูล</button>
                                        </div>
                                   <?php
                                    endif;
                                    endif;
                                   ?>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
            </div>
        </div>
        <?php
        endif;
        ?>
    </div>
</div>

<!-- script -->
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS --><!-- Bootstrap JS -->
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
<script type="text/javascript">
    function changeFunc(){
        let selectBox = document.getElementById("p_id");
        let value = selectBox.options[selectBox.selectedIndex].value;
        if(value != null){
            location.href = "stock_in.php?p_id="+value+"";
        }
    }
</script>
<script>
    $(document).ready(function () {

        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

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
