<?php 
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'connection.php');
$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['view-documents'])){
    $claimantId = stripslashes($_REQUEST['claimant_id']);  
    $claimantId = mysqli_real_escape_string($con, $claimantId);

    session_start();
    $_SESSION["v_claimant_id"] = $claimantId;
    header("location: ../temp.php?page=document/folder");
}

if(isset($_GET['view-claim'])){
    $claimantId = stripslashes($_REQUEST['claimant_id']);  
    $claimantId = mysqli_real_escape_string($con, $claimantId);

    session_start();
    $_SESSION["v_claimant_id"] = $claimantId;
    header("location: ../temp.php?page=claim/claim-details");
}

if(isset($_GET['edit'])){
    $claimantId = stripslashes($_REQUEST['claimant_id']);  
    $claimantId = mysqli_real_escape_string($con, $claimantId);

    session_start();
    $_SESSION["v_claimant_id"] = $claimantId;
    header("location: ../temp.php?page=claimant/claimant-details");
}
?>