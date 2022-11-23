<?php 
session_start();
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'connection.php');
require_once(CONTROLLERS.'userController.php');
$userController = new UserController();

$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['email'])){
    
    $emailAddress = stripslashes($_REQUEST['email']);  
    $emailAddress = mysqli_real_escape_string($con, $emailAddress);

    $password = stripslashes($_REQUEST['password']);  
    $password = mysqli_real_escape_string($con, $password);

    $password2 = stripslashes($_REQUEST['repeat_password']);  
    $password2 = mysqli_real_escape_string($con, $password2);

    $registering = true;

    if(!$userController->checkEmail($emailAddress)){
        $_SESSION["msg"] = "Email address is not registered in the system.";
        header("location: register.php");
        die();
    }

    if($password == $password2){
        $userController->createUser($firstName=null,$lastName=null,$ecNumber=null,$designation=null,$emailAddress,$password,$registering);
        $_SESSION["msg"] = "User registered successfully";
        header("location: ../temp.php?page=admin/profile");
        die();
    }else{
        $_SESSION["msg"] = "Passwords do not match";
        header("location: register.php");
        die();
    }

}else{
    $_SESSION["msg"] = "Failed to register user";
    header("location: register.php");
    die();
}
?>