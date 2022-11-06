<?php
    define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
	require_once(CONTROLLERS.'userController.php');
    require_once(CONTROLLERS.'connection.php');

	$userController = new UserController();
    $db = new Connection('localhost','root','','fms_db');
    $con = $db->openConnection();

    if(isset($_GET['email'])){
        $email = stripslashes($_REQUEST['email']);  
        $email = mysqli_real_escape_string($con, $email);

        $password = stripslashes($_REQUEST['password']);  
        $password = mysqli_real_escape_string($con, $password);

        if($userController->login($email, $password)){
            $msg = "User successfully logged in";
            $_SESSION["page"] = "claim/claim";
            header("Location: ../temp.php?$msg");
            die();
        }else{
            $msg = "Email address or password incorrect";
            header("Location: login.php?$msg");
            die();
        }
    }
?>