<?php 
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'connection.php');
require_once(CONTROLLERS.'userController.php');

$userController = new UserController();
$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['edit'])){
    $userId = stripslashes($_REQUEST['id']);  
    $userId = mysqli_real_escape_string($con, $userId);

    session_start();
    $_SESSION["v_user_id"] = $userId;
    header("location: ../temp.php?page=admin/edit-user");
}

if(isset($_GET['delete'])){
    $userId = stripslashes($_REQUEST['id']);  
    $userId = mysqli_real_escape_string($con, $userId);

    if($userController->deleteUserById($userId)){
        session_start();
        $_SESSION["msg"] = "User deleted successfully";
        header("location: ../temp.php?page=admin/users");
    }else{
        $_SESSION["msg"] = "Failed to delete user";
        header("location: ../temp.php?page=admin/users");
    }
    
}
?>