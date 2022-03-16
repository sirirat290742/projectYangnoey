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
        <div class="container my-4" style="padding: 0px 50px">
            <div class="row">
                <?php
                    // LOAD CUSTOMER COUNT
                    $sql = "select count(*) as total from member";
                    $load = $con->query($sql);
                    if($data = $load->fetch_assoc()):
                ?>
                <div class="mb-3 col-lg-3">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">จำนวนสมาชิก</div>
                        <div class="card-body">
                            <p class="card-content"><?php echo $data['total'] ?> คน</p>
                        </div>
                    </div>
                </div>
                <?php
                    endif;
                ?>

                <?php
                // LOAD CUSTOMER COUNT
                $sql = "select count(*) as total from stock";
                $load = $con->query($sql);
                if($data = $load->fetch_assoc()):
                    ?>
                    <div class="mb-3 col-lg-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-header">จำนวนสินค้า</div>
                            <div class="card-body">
                                <p class="card-content"><?php echo $data['total'] ?> รายการ</p>
                            </div>
                        </div>
                    </div>
                <?php
                endif;
                ?>
                    <div class="mb-3 col-lg-6">
                        <form action="assets/php/add_product.php" method="post" enctype="multipart/form-data">
                        <div class="round-container">
                            <div class="round-header">
                                เพิ่มรายการสินค้า
                            </div>
                            <div class="round-content">
                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <input type="text" name="p_detail" placeholder="ชื่อสินค้า" class="form-control">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <input type="text" name="p_price" placeholder="ราคา" class="form-control">
                                    </div>
                                    <div class="mb-3 col-lg-4">
                                        <input type="number" name="stock_in" placeholder="จำนวนสินค้า" class="form-control">
                                    </div>
                                    
                                    
                                    <div class="mb-3 col-lg-6">
                        
                                    <div class="form-group">
                                        <select class="form-control" id="exampleFormControlSelect1" name="type">
                                        <option value="เนื้อสัตว์">เนื้อสัตว์</option>
                                        <option value="ผัก">ผัก</option>
                                        <option value="ของทานเล่น">ของทานเล่น</option>
                                        <option value="เครื่องดื่ม">เครื่องดื่ม</option>
                                        </select>
                                    </div>


                                </div>


                                <div class="mb-3 col-lg-6">
                                    
                                    <input type="file" name="file" required class="form-control">
                                </div>


                                </div>
                                <div class="mb-3 col-lg-12">
                                    <button class="btn btn-success form-control" type="submit">เพิ่มรายการสินค้า</button>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                <div class="mb-3 col-lg-6">
                    <div class="round-container">
                        <div class="round-header">
                            รายการสินค้าล่าสุด
                        </div>
                        <div class="round-content">
                            <table class="table table-hover">
                                <thead class="table-bordered">
                                <tr>
                                    <th>รหัสสินค้า</th>
                                    <th>ชื่อสินค้า</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // LOAD STOCK
                                $sql = "select p_id,p_detail from stock limit 15";
                                $load = $con->query($sql);
                                while($data = $load->fetch_assoc()):
                                ?>
                                <tr>
                                    <td><?php echo $data['p_id'] ?></td>
                                    <td><?php echo $data['p_detail'] ?></td>
                                </tr>
                                <?php
                                endwhile;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-lg-6">
                    <div class="round-container">
                        <div class="round-header">
                            รายชื่อลูกค้าล่าสุด
                        </div>
                        <div class="round-content">
                            <table class="table table-hover">
                                <thead class="table-bordered">
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อจริง</th>
                                    <th>นามสกุล</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // LOAD STOCK
                                $i=1;
                                $sql = "select fname , lname from member order by member_id desc limit 5";
                                $load = $con->query($sql);
                                while($data = $load->fetch_assoc()):
                                ?>
                                <tr>
                                    <td><?php echo $i ?></td>
                                    <td><?php echo $data['fname'] ?></td>
                                    <td><?php echo $data['lname'] ?></td>
                                </tr>
                                <?php
                                $i++;
                                endwhile;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
