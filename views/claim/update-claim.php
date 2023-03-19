<?php
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
session_start();
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'connection.php');
require_once(CONTROLLERS1.'userController.php');

$userController = new UserController();
$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['update-claim'])){
    $id = stripslashes($_REQUEST['id']);  
    $id = mysqli_real_escape_string($con, $id);

    $injuryType = stripslashes($_REQUEST['injury_type']);  
    $injuryType = mysqli_real_escape_string($con, $injuryType);

    $place = stripslashes($_REQUEST['place']);
    $place = mysqli_real_escape_string($con, $place);

    $date = stripslashes($_REQUEST['date']);  
    $date = mysqli_real_escape_string($con, $date);

    $stage = stripslashes($_REQUEST['stage']);
    $stage = mysqli_real_escape_string($con, $stage);

    $status = stripslashes($_REQUEST['status']);
    $status = mysqli_real_escape_string($con, $status);

    $referenceId = stripslashes($_REQUEST['reference_id']);
    $referenceId = mysqli_real_escape_string($con, $referenceId);

    if($userController->updateClaim($id,$injuryType,$place,$date,$stage,$status,$referenceId)){
        $_SESSION["msg"] = "Claim updated successfully!";
        header("location: ../temp.php?page=claim/claim-details");
    }else{
        $_SESSION["msg"] = "Failed to updated claim!";
        header("location: ../temp.php?page=claim/claim-details");
    }

}
?>