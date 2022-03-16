<?php
session_start();
if(!isset($_SESSION['staff_id'])) header("location:index.php");
$e_id = $_SESSION['staff_id'];
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
                        แก้ไขข้อมูลบัญชี
                    </div>
                </div>
                <?php include 'assets/php/log.php'?>
            </div>
            <?php
            $sql = "select * from staff where staff_id='$e_id'";
            $load=  $con->query($sql);
            if($data =$load->fetch_assoc()):
                ?>
                <form action="assets/php/update_member.php" method="post">
                    <div class="row my-4" style="padding: 50px">
                        <div class="mb-3 col-lg-6">
                            <label for="fname" class="form-label">ชื่อจริง</label>
                            <input type="text" name="fname"  value="<?php echo $data['fname'] ?>" required class="form-control">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="lname" class="form-label">นามสกุล</label>
                            <input type="text" name="lname"  value="<?php echo $data['lname'] ?>" required class="form-control">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="username" class="form-label">ชื่อผู้ใช้</label>
                            <input type="text" name="username"  value="<?php echo $data['username'] ?>" required class="form-control">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input type="password" name="password"  value="<?php echo $data['password'] ?>" required class="form-control">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="email" class="form-label">อีเมล์</label>
                            <input type="text" name="email"  value="<?php echo $data['email'] ?>" required class="form-control">
                        </div>
                        <div class="mb-3 col-lg-12">
                            <input type="text" name="e_id" value="<?php echo $data['staff_id'] ?>" hidden>
                            <button class="btn btn-success" style="float:right">บันทึกข้อมูล</button>
                        </div>
                    </div>
                </form>
            <?php
            endif;
            ?>
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
