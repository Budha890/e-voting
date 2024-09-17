<?php 
session_start();
if(isset($_SESSION['userid'])&& isset($_SESSION['fname'])&&isset($_SESSION['role'])){
    unset($_SESSION['userid']);
    unset($_SESSION['fname']);
    unset($_SESSION['role']);
    header('location:login.php');
  }

?>