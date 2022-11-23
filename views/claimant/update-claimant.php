<?php
session_start();
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'connection.php');
require_once(CONTROLLERS1.'userController.php');

$userController = new UserController();
$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['update-claimant'])){
    $id = stripslashes($_REQUEST['id']);  
    $id = mysqli_real_escape_string($con, $id);

    $firstName = stripslashes($_REQUEST['first_name']);  
    $firstName = mysqli_real_escape_string($con, $firstName);

    $lastName = stripslashes($_REQUEST['last_name']);
    $lastName = mysqli_real_escape_string($con, $lastName);

    $nationalId = stripslashes($_REQUEST['national_id']);  
    $nationalId = mysqli_real_escape_string($con, $nationalId);

    $ecNumber = stripslashes($_REQUEST['ec_number']);
    $ecNumber = mysqli_real_escape_string($con, $ecNumber);

    $department = stripslashes($_REQUEST['department']);
    $department = mysqli_real_escape_string($con, $department);

    if($userController->updateClaimant($id,$firstName,$lastName,$nationalId,$ecNumber,$department)){
        $_SESSION["msg"] = "Claimant updated successfully!";
        header("location: ../temp.php?page=claimant/claimant-details");
    }else{
        $_SESSION["msg"] = "Failed to updated claimant!";
        header("location: ../temp.php?page=claimant/claimant-details");
    }

}else{}
?>