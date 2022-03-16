
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





<div class="wrapper">
    <!-- Sidebar -->
    <?php include 'assets/object/sidebar2.php'?>
    <!-- Page Content -->
    <div id="content">
        <?php include 'assets/object/navbar2.php'?>

    
        <div class="container my-4">
            <div class="row">
                <div class="mb-3 col-lg-12">
                    <table class="table table-hover">
                        
                        <img class="card-img-top" src="images/banner.jpg" alt="Card image" height="350px" >
                      
                        <tbody>
                      
                        
                        <div class="py-5" id="demo"> 
                          <div class="container">
                            <div class="row hidden-md-up">

                          
                             
                              <?php $sql = "select * from stock";
                                    $load = $con->query($sql);
                                    while($data = $load->fetch_assoc()):
                                    ?>
                                          
                              <div class="col-md-3">
                                <div class="card">
                                  <div class="card-block">
                                    <h4 class="card-title">
                                    <center>
                                    <img class="card-img-top" src="assets/php/uploads/<?php echo $data['image']?>" alt="Card image" style="width:100%">
                                    <?php echo $data['p_detail']?> </h4>
                                    <h6>
                                    <?php $sql1 = "select * from stock_in where p_id = '".$data['p_id']."'";
                                          $load1 = $con->query($sql1);?>
                                          สินค้าคงเหลือ : <?php $data1 = $load1->fetch_assoc(); echo $data1['stock_in']; ?></h6>
                                    <center><a href="card.php?item='<?php echo $data1['p_id']?>'" class="btn btn-primary"><i class='fas fa-cart-plus'></i>หยิบใส่ตะกร้า</a>
                                    </center>
                                  </div>
                                </div>
                              </div>

                              <?php
                            endwhile;
                            ?>
                            


                            </div>
                          </div>
                        </div>
                      

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>


<script>
    $(document).ready(function () {

       
       

        $('#sidebarCollapse').on('click', function () {
            // open or close navbar
            $('#sidebar').toggleClass('active');
            // close dropdowns
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });

        $('#a').on('click', function () {
  
                      var passMsg = `<div class="py-5"><div class="container"><div class="row hidden-md-up">`

                              <?php $sql = "select * from stock where p_type='เนื้อสัตว์'";
                                  $load = $con->query($sql);
                                  while($data = $load->fetch_assoc()):
                                ?>
                                          
                              passMsg += `<div class="col-md-3">
                                <div class="card">
                                  <div class="card-block">
                                    <h4 class="card-title">
                                    <center>
                                    <img class="card-img-top" src="assets/php/uploads/<?php echo $data['image']?>" alt="Card image" style="width:100%">
                                    <!-- <img class="card-img-top" src="images/1.3.jpg" alt="Card image" style="width:100%"> -->
                                    <?php echo $data['p_detail']?> </h4>
                                    <h6>
                                    <?php $sql1 = "select * from stock_in where p_id = '".$data['p_id']."'";
                                          $load1 = $con->query($sql1);?>
                                          สินค้าคงเหลือ : <?php $data1 = $load1->fetch_assoc(); echo $data1['stock_in']; ?></h6>
                                    <center><a href="card.php?item='<?php echo $data1['p_id']?>'" class="btn btn-primary"><i class='fas fa-cart-plus'></i>หยิบใส่ตะกร้า</a>
                                    </center>
                                  </div>
                                </div>
                              </div>`

                              <?php
                            endwhile;
                            ?>

                            passMsg +=`</div></div></div>`

        document.getElementById("demo").innerHTML = passMsg;

        });


        $('#b').on('click', function () {
            var passMsg = `<div class="py-5"><div class="container"><div class="row hidden-md-up">`

            <?php $sql = "select * from stock where p_type='ผัก'";
                $load = $con->query($sql);
                while($data = $load->fetch_assoc()):
              ?>
                        
            passMsg += `<div class="col-md-3">
              <div class="card">
                <div class="card-block">
                  <h4 class="card-title">
                  <center>
                  <img class="card-img-top" src="assets/php/uploads/<?php echo $data['image']?>" alt="Card image" style="width:100%">
                  <!-- <img class="card-img-top" src="images/1.3.jpg" alt="Card image" style="width:100%"> -->
                  <?php echo $data['p_detail']?> </h4>
                  <h6>
                  <?php $sql1 = "select * from stock_in where p_id = '".$data['p_id']."'";
                        $load1 = $con->query($sql1);?>
                        สินค้าคงเหลือ : <?php $data1 = $load1->fetch_assoc(); echo $data1['stock_in']; ?></h6>
                  <center><a href="card.php?item='<?php echo $data1['p_id']?>'" class="btn btn-primary"><i class='fas fa-cart-plus'></i>หยิบใส่ตะกร้า</a>
                  </center>
                </div>
              </div>
            </div>`

            <?php
            endwhile;
            ?>

            passMsg +=`</div></div></div>`

            document.getElementById("demo").innerHTML = passMsg;
        });


        $('#c').on('click', function () {
          var passMsg = `<div class="py-5"><div class="container"><div class="row hidden-md-up">`

          <?php $sql = "select * from stock where p_type='ของทานเล่น'";
              $load = $con->query($sql);
              while($data = $load->fetch_assoc()):
            ?>
                      
          passMsg += `<div class="col-md-3">
            <div class="card">
              <div class="card-block">
                <h4 class="card-title">
                <center>
                <img class="card-img-top" src="assets/php/uploads/<?php echo $data['image']?>" alt="Card image" style="width:100%">
                <!-- <img class="card-img-top" src="images/1.3.jpg" alt="Card image" style="width:100%"> -->
                <?php echo $data['p_detail']?> </h4>
                <h6>
                <?php $sql1 = "select * from stock_in where p_id = '".$data['p_id']."'";
                      $load1 = $con->query($sql1);?>
                      สินค้าคงเหลือ : <?php $data1 = $load1->fetch_assoc(); echo $data1['stock_in']; ?></h6>
                <center><a href="card.php?item='<?php echo $data1['p_id']?>'" class="btn btn-primary"><i class='fas fa-cart-plus'></i>หยิบใส่ตะกร้า</a>
                </center>
              </div>
            </div>
          </div>`

          <?php
          endwhile;
          ?>

          passMsg +=`</div></div></div>`

          document.getElementById("demo").innerHTML = passMsg;
        });

        $('#d').on('click', function () {
          var passMsg = `<div class="py-5"><div class="container"><div class="row hidden-md-up">`

          <?php $sql = "select * from stock where p_type='เครื่องดื่ม'";
              $load = $con->query($sql);
              while($data = $load->fetch_assoc()):
            ?>
                      
          passMsg += `<div class="col-md-3">
            <div class="card">
              <div class="card-block">
                <h4 class="card-title">
                <center>
                <img class="card-img-top" src="assets/php/uploads/<?php echo $data['image']?>" alt="Card image" style="width:100%">
                <!-- <img class="card-img-top" src="images/1.3.jpg" alt="Card image" style="width:100%"> -->
                <?php echo $data['p_detail']?> </h4>
                <h6>
                <?php $sql1 = "select * from stock_in where p_id = '".$data['p_id']."'";
                      $load1 = $con->query($sql1);?>
                      สินค้าคงเหลือ : <?php $data1 = $load1->fetch_assoc(); echo $data1['stock_in']; ?></h6>
                <center><a href="card.php?item='<?php echo $data1['p_id']?>'" class="btn btn-primary"><i class='fas fa-cart-plus'></i>หยิบใส่ตะกร้า</a>
                </center>
              </div>
            </div>
          </div>`

          <?php
          endwhile;
          ?>

          passMsg +=`</div></div></div>`

          document.getElementById("demo").innerHTML = passMsg;
        });

    });
</script>
</body>
</html>






  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
  <script src="https://pingendo.com/assets/bootstrap/bootstrap-4.0.0-alpha.6.min.js"></script>