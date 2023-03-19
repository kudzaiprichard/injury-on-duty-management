<?php 
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'connection.php');
$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['submit'])){
    $claimantId = stripslashes($_REQUEST['claimant_id']);  
    $claimantId = mysqli_real_escape_string($con, $claimantId);

    $FolderId = stripslashes($_REQUEST['folder_id']);  
    $FolderId = mysqli_real_escape_string($con, $FolderId);

    session_start();
    $_SESSION["claimant_id"] = $claimantId;
    $_SESSION["folder_id"] = $FolderId;
    header("location: ../temp.php?page=document/folder");
}
?>