<?php
define('MODELS',$_SERVER['DOCUMENT_ROOT']."/fms/models/");
require_once(MODELS.'user.php');

class AuthService{
    private $db;
    function __construct(){$this->db = new Connection('localhost','root','','fms_db');}

    function createUser($firstName,$lastName,$ecNumber,$designation,$emailAddress,$password,$registering){
        $con = $this->db->openConnection();
        $registered = false;
        if($registering == false){
            $query  = "INSERT INTO `users`(`first_name`, `last_name`, `ec_number`, `designation`, `email`)
                                    VALUES('$firstName','$lastName','$ecNumber','$designation','$emailAddress') ";

            if ($result = mysqli_query($con, $query)) {
                $registered = true;
            }
        }

        if($registering == true){
            $query  = "UPDATE `users` SET `password` = '" . md5($password) . "' WHERE `email` = '$emailAddress'";

            if ($result = mysqli_query($con, $query)) {
                $registered = true;
            }
        }

        return $registered;
    }

    function updateProfile($id,$firstName,$lastName,$email,$ecNumber,$designation,$password){
        $con = $this->db->openConnection();
        $isUpdated = false;

        $query = "UPDATE `users` SET `first_name`= '$firstName', `last_name`='$lastName', `email`='$email',
                                    `ec_number`='$ecNumber', `designation`='$designation', 
                                    `password` = '" . md5($password) . "'  WHERE  `id` = '$id'"; 

        $query2 = "UPDATE `users` SET `first_name`= '$firstName', `last_name`='$lastName', `email`='$email',
                                    `ec_number`='$ecNumber', `designation`='$designation'  WHERE  `id` = '$id'"; 
        
        if($password == null || $password == " "){
            if($result = mysqli_query($con, $query2)){
                $_SESSION["email"] = $email;
                $isUpdated = true;
            }
        }else{
            if($result = mysqli_query($con, $query)){
                $_SESSION["email"] = $email;
                $isUpdated = true;
            }
        }
        return $isUpdated;
    }

    function login($email, $password){
        $con = $this->db->openConnection();
        $query  = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '" . md5($password) . "' ";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        $isLogged = false;

        if ($rows == 1) {
            $row = $result->fetch_assoc();
            $isLogged = true;
        }

        $con->close(); 
        
        return $isLogged;
    }

    function fetchAllUsers(){
        $users = array();
        $con = $this->db->openConnection();
        $query = "SELECT * FROM `users`";
        $result = mysqli_query($con, $query);

        while($row = $result->fetch_assoc()) {
            $user = new User($row['id'],$row['first_name'],$row['last_name'],$row['ec_number'],$row['designation'],$row['email'],$row['password']);
            array_push($users, $user);
            unset($user);
        }

        $con->close(); 
        return $users;
    }
    function checkEmail($email){
        $checked = false;
        $con = $this->db->openConnection();
        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);

        if($rows == 1){
            $checked = true;
        }
        
        return $checked;
    }

    function getLoggedInUser($email){
        $con = $this->db->openConnection();
        $query = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result = mysqli_query($con, $query);

        $row = $result->fetch_assoc();
        $user = new User($row['id'],$row['first_name'],$row['last_name'],$row['ec_number'],$row['designation'],$row['email'],$row['password']);
        return $user;
    }

    function logout(){
        session_destroy();
    }
}
?>