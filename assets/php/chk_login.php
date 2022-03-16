<?php
    session_start();
    include 'connect.php';
    $username = $_POST['username'];
    $password = mysqli_real_escape_string($con,$_POST['pass']);
    $pass = md5($password);

    // LOGIN
    $sql = "select * from staff where username = '$username'";
    $load = $con->query($sql);
    if($data = $load->fetch_assoc()){
        if($data['password'] == $pass){
            $_SESSION['staff_id'] = $data['staff_id'];

            header("location:../../select_page.php");
        }
        else{
            $_SESSION['error'] = "รหัสผ่านไม่ถูกต้อง";
            header("location:../../index.php");
        }
    }
    else{
        $_SESSION['error'] = "ไม่พบบัญชีผู้ใช้นี้";
        header("location:../../index.php");
    }
