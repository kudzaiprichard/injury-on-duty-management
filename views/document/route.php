<?php 
session_start();
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'connection.php');
require_once(CONTROLLERS.'userController.php');

$userController = new UserController();
$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['delete'])){
    $fileId = stripslashes($_REQUEST['id']);  
    $fileId = mysqli_real_escape_string($con, $fileId);

    if($userController->deleteFileById($fileId)){
        session_start();
        $_SESSION["msg"] = "File deleted successfully";
        header("location: ../temp.php?page=document/folder");
    }else{
        $_SESSION["msg"] = "Failed to delete file";
        header("location: ../temp.php?page=document/folder");
    }

}

if(isset($_GET['edit'])){
    $fileId = stripslashes($_REQUEST['id']);  
    $fileId = mysqli_real_escape_string($con, $fileId);

    $_SESSION["f_file_id"] = $fileId;
    header("location: ../temp.php?page=document/update-file");
}
?>