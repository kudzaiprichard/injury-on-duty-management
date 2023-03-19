<?php
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
session_start();
    define('PATH',$_SERVER['DOCUMENT_ROOT']."/fms/");
    define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
    require_once(CONTROLLERS.'connection.php');
    require_once(CONTROLLERS.'userController.php');
    $userController = new UserController();
    
    $db = new Connection("localhost", "root", "", "fms_db");
    $con = $db->openConnection();
    $folderId = $_SESSION["folder_id"];

    $targetFolder = PATH . "uploads/";

    $path = $_FILES['file']['name'];
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $base = pathinfo($path, PATHINFO_FILENAME);
    $file_name = $base.'_'.date("H_i_s").'.'.$ext;

    $targetFolder = $targetFolder . $file_name;

    if (isset($_POST['upload'])) {
        $name = stripslashes($_REQUEST['name']);  
        $name = mysqli_real_escape_string($con, $name); 

        move_uploaded_file($_FILES['file']['tmp_name'], $targetFolder);
        print $file_name;
        

        $userController->uploadFile($file_name,$name,$folderId);

        header("Location: ../temp.php?page=document/folder");
        die();

    }elseif(isset($_POST['update'])){
        $id = stripslashes($_REQUEST['id']);  
        $id = mysqli_real_escape_string($con, $id);

        $name = stripslashes($_REQUEST['name']);  
        $name = mysqli_real_escape_string($con, $name); 

        move_uploaded_file($_FILES['file']['tmp_name'], $targetFolder);

        if($_FILES['file']['name'] == null){$file_name = null;}

        // print $file_name;
        // exit();
        if($userController->updateFile($id,$file_name,$name)){
            header("Location: ../temp.php?page=document/folder");
            die();
        }

    }
    else{
        header("Location: ../temp.php?page=document/folder");
        die();
    }
?>