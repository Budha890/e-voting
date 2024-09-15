<?php
require_once("evoting.php");
$register = new evoting($connection);

if(isset($_POST["btn_login"]) && $_GET['form']=='login')
{
    $email = $_POST['email'];
    $password = $_POST['password'];

  if(empty($register->validateEmail($email))){

    header('location: login.php?alert='.'invalid User Email Not found');
    die();
  }
  if(!empty($register->checkLogin($email , $password))){

  if($register->checkLogin($email , $password)[0]['role'] == 'admin'){
    header("location:dashboard.php?alert="."welcome To Dashboard.");
    die();
  }else{

    header("location:voting.php?alert=".'logged');
    die();}

  }
  header('location: login.php?alert='.'Credential Issue Please Check Password and Email');
  die();
}



if(isset($_POST["btn_register"]) && $_GET['form']=='register')
{
$email = $_POST['email'];
$password = $_POST['password'];
$full_name = $_POST['fname'];
$phone = $_POST['contact'];

if(empty($register->validateEmail($email))){
    $register->register($email,$password,$full_name,$phone);

    header("location:login.php");

}else{

    echo " Email Already Exist";
}



}

?>
