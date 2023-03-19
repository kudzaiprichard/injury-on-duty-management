<?php
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'connection.php');
require_once(CONTROLLERS.'userController.php');

$userController = new UserController();
$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['view-documents'])){
    $claimId = stripslashes($_REQUEST['claimant_id']);  
    $claimId = mysqli_real_escape_string($con, $claimId);

    session_start();
    $_SESSION["v_claimant_id"] = $claimId;
    header("location: ../temp.php?page=document/folder");
}

if(isset($_GET['view-claimant'])){
    $claimantId = stripslashes($_REQUEST['claimant_id']);  
    $claimantId = mysqli_real_escape_string($con, $claimantId);

    session_start();
    $_SESSION["v_claimant_id"] = $claimantId;
    header("location: ../temp.php?page=claimant/claimant-details");
}

if(isset($_GET['edit'])){
    $claimId = stripslashes($_REQUEST['claim_id']);  
    $claimId = mysqli_real_escape_string($con, $claimId);

    session_start();
    $_SESSION["v_claim_id"] = $claimId;
    header("location: ../temp.php?page=claim/claim-details");
}

if(isset($_GET['delete'])){
    $claimId = stripslashes($_REQUEST['claim_id']);  
    $claimId = mysqli_real_escape_string($con, $claimId);

    if($userController->deleteClaimById($claimId)){
        session_start();
        $_SESSION["msg"] = "Claim deleted successfully";
        header("location: ../temp.php?page=claim/claim");
    }else{
        $_SESSION["msg"] = "Failed to delete claim";
        header("location: ../temp.php?page=claim/claim");
    }
    
}
?>