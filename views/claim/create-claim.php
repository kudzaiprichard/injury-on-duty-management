<?php 
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'connection.php');
require_once(CONTROLLERS.'userController.php');
$userController = new UserController();

$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['first_name'])){
    ##Claimant Details
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

    ##Injury Details
    $type = stripslashes($_REQUEST['type']);  
    $type = mysqli_real_escape_string($con, $type);

    $place = stripslashes($_REQUEST['place']);  
    $place = mysqli_real_escape_string($con, $place);

    $date = stripslashes($_REQUEST['date']);  
    $date = mysqli_real_escape_string($con, $date);

    $stage = stripslashes($_REQUEST['stage']);  
    $stage = mysqli_real_escape_string($con, $stage);

    $status = stripslashes($_REQUEST['status']);  
    $status = mysqli_real_escape_string($con, $status);

    $reference = stripslashes($_REQUEST['reference']);  
    $reference = mysqli_real_escape_string($con, $reference);
    
    if($idArray = $userController->createClaim($firstName,$lastName,$nationalId,$ecNumber,$department,$type,$place,$date,$stage,$status,$reference)){
        session_start();
        $_SESSION["claimant_id"] = $idArray[1];
        $_SESSION["folder_id"] = $idArray[0];

        // print $idArray[1];
        // print $idArray[0];

        $_SESSION["msg1"] = "Enter claimant relevant documents";
        

        header("location: ../temp.php?page=document/folder");
    }else{
        print "Failed to create claim";
        exit();
        $_SESSION["msg1"] = "Failed to create claim";
        header("location: ../temp.php?page=claim/claim");
    }
    
}else{
    $_SESSION["msg1"] = "Failed to create claim";
    header("location: ../temp.php?page=claim/claim");
}
?>