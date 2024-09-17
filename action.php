<?php
session_start();
include_once("function.php");
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

    $userid = $register->checkLogin($email , $password)[0]['id'];
    $fname = $register->checkLogin($email , $password)[0]['username'];
    $role = $register->checkLogin($email , $password)[0]['role'];

    loginToV($userid,$fname ,$role);
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



$conn = new mysqli('localhost', 'root', '', 'voting_system');

if (isset($_POST['btn_create_candidate'])) {

    // Retrieve and sanitize input
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact = mysqli_real_escape_string($conn, $_POST['contact']);

    // Handle image upload
    if (isset($_FILES['cimg']) && $_FILES['cimg']['error'] === 0) {
        $img_name = $_FILES['cimg']['name'];
        $img_tmp_name = $_FILES['cimg']['tmp_name'];
        $img_size = $_FILES['cimg']['size'];
        $img_ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
        $allowed_exts = array("jpg", "jpeg", "png");

        // Check file extension
        if (in_array($img_ext, $allowed_exts)) {
            // Move the file to the desired folder
            $img_url = 'uploads/' . uniqid() . '.' . $img_ext;
            move_uploaded_file($img_tmp_name, $img_url);

            // Insert candidate details into the database
            $stmt = $conn->prepare("INSERT INTO candidates (name, party, contact, Address, img_url) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssiss", $cname, $pname, $contact, $address, $img_url);

            if ($stmt->execute()) {
                echo "Candidate created successfully!";
                header("location:dashboard.php?alert=".'candidated addded');
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Invalid image file type. Only JPG, JPEG, and PNG are allowed.";
        }
    } else {
        echo "Image upload error.";
    }
}
?>
.


?>
