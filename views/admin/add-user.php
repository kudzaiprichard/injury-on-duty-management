<?php 
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'connection.php');
require_once(CONTROLLERS.'userController.php');
$userController = new UserController();

$db = new Connection("localhost", "root", "", "fms_db");
$con = $db->openConnection();

if(isset($_GET['create'])){
    $firstName = stripslashes($_REQUEST['first_name']);  
    $firstName = mysqli_real_escape_string($con, $firstName);

    $lastName = stripslashes($_REQUEST['last_name']);  
    $lastName = mysqli_real_escape_string($con, $lastName);

    $ecNumber = stripslashes($_REQUEST['ec_number']);  
    $ecNumber = mysqli_real_escape_string($con, $ecNumber);

    $designation = stripslashes($_REQUEST['designation']);  
    $designation = mysqli_real_escape_string($con, $designation);

    $emailAddress = stripslashes($_REQUEST['email']);  
    $emailAddress = mysqli_real_escape_string($con, $emailAddress);

    $registering = false;
    $password = null;
    $msg = "User added successfully";
    
    $userController->createUser($firstName,$lastName,$ecNumber,$designation,$emailAddress,$password,$registering);
    header("location: ../temp.php?page=admin/users");
}

if(isset($_GET['update'])){
    $id = stripslashes($_REQUEST['id']);
    $id = mysqli_real_escape_string($con, $id);

    $firstName = stripslashes($_REQUEST['first_name']);  
    $firstName = mysqli_real_escape_string($con, $firstName);

    $lastName = stripslashes($_REQUEST['last_name']);  
    $lastName = mysqli_real_escape_string($con, $lastName);

    $ecNumber = stripslashes($_REQUEST['ec_number']);  
    $ecNumber = mysqli_real_escape_string($con, $ecNumber);

    $designation = stripslashes($_REQUEST['designation']);  
    $designation = mysqli_real_escape_string($con, $designation);

    $emailAddress = stripslashes($_REQUEST['email']);  
    $emailAddress = mysqli_real_escape_string($con, $emailAddress);


    $msg = "User added successfully";
    $userController->editUser($id,$firstName,$lastName,$ecNumber,$designation,$emailAddress);
    header("location: ../temp.php?page=admin/edit-user");
}

?>