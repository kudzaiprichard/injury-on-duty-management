<?php
session_start();
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'connection.php');
require_once(CONTROLLERS1.'userController.php');

$userController = new UserController();
$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['update-profile'])){
    $id = stripslashes($_REQUEST['id']);  
    $id = mysqli_real_escape_string($con, $id);

    $email = stripslashes($_REQUEST['email']);  
    $email = mysqli_real_escape_string($con, $email);

    $firstName = stripslashes($_REQUEST['first_name']);  
    $firstName = mysqli_real_escape_string($con, $firstName);

    $lastName = stripslashes($_REQUEST['last_name']);
    $lastName = mysqli_real_escape_string($con, $lastName);

    $ecNumber = stripslashes($_REQUEST['ec_number']);
    $ecNumber = mysqli_real_escape_string($con, $ecNumber);

    $designation = stripslashes($_REQUEST['designation']);
    $designation = mysqli_real_escape_string($con, $designation);

    $password = stripslashes($_REQUEST['password']);  
    $password = mysqli_real_escape_string($con, $password);

    $confirmPassword = stripslashes($_REQUEST['confirm_password']);  
    $confirmPassword = mysqli_real_escape_string($con, $confirmPassword);

    if($password == $confirmPassword){
        if($userController->updateProfile($id,$firstName,$lastName,$email,$ecNumber,$designation,$password)){
            $_SESSION["msg"] = "Profile updated successfully!";
            header("location: ../temp.php?page=admin/profile");
        }else{
            $_SESSION["msg"] = "Failed to updated profile!";
            header("location: ../temp.php?page=admin/profile");
        }
    }

}
?>