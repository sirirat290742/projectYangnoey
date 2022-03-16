<?php
session_start();
include'assets/php/connect.php';
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
                        สมาชิกในระบบทั้งหมด
                    </div>
                </div>
                <?php include 'assets/php/log.php'?>
            </div>
        </div>
        <div class="container my-4">
            <div class="row" style="padding: 0px 50px">
                <div class="mb-3 col-lg-12">
                    <table class="table table-hover">
                        <thead class="table-bordered">
                            <tr  align="center">
                                <th>รหัสสินค้า</th>
                                <th>ชื่อสินค้า</th>
                                <th>ราคา</th>
                                <th>จำนวนสินค้าในสต็อก</th>
                                <th>จำนวนสินค้าในคลัง</th>
                                <th>ดู/แก้ไข</th>
                                <th>ลบ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // LOAD MEMBER DATA
                        $sql = "select * from stock left join stock_in on stock.p_id=stock_in.p_id ";
                        $load = $con->query($sql);
                        while ($data = $load->fetch_assoc()):
                        ?>
                            <tr align="center">
                                <td><?php echo $data['p_id'] ?></td>
                                <td><?php echo $data['p_detail'] ?></td>
                                <td><?php echo $data['p_price'] ?></td>
                                <td><?php echo $data['stock_out'] ?></td>
                                <td><?php echo $data['stock_in'] ?></td>
                                <td><a href="edit_product.php?m_id=<?php echo $data['p_id'] ?>" class="btn btn-primary">ดู/แก้ไข</a></td>
                                <td><button onclick="return con(<?php echo $data['p_id'] ?>);" class="btn btn-danger">ลบ</button></td>
                            </tr>
                        <?php
                        endwhile;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- script -->

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>

<script type="text/javascript">
    function con(x){
        if(window.confirm("คุณต้องการลบใช่หรือไม่")){
            location.href = "assets/php/del_product.php?p_id="+x+"";
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
