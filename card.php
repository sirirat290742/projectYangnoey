<?php
session_start();

$i = $_GET['item'];

if (!isset($_SESSION[$i])){
    $_SESSION[$i] = 1;
}else{
  $_SESSION[$i] += 1;
}
?>
<script>
    window.history.back();
</script>