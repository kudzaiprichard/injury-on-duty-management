<?php
class AuthService{
    private $db;
    function __construct(){$this->db = new Connection('localhost','root','','fms_db');}

    function register($firstName, $lastName, $ecNumber, $designation, $email, $password){

    }

    function login($email, $password){
        $con = $this->db->openConnection();
        $query  = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password' ";
        $result = mysqli_query($con, $query);
        $rows = mysqli_num_rows($result);
        $isLogged = false;

        if ($rows == 1) {
            $row = $result->fetch_assoc();
            session_start();
            $_SESSION['email'] = $row['email'];
            $isLogged = true;
        }

        $con->close(); 
        
        return $isLogged;
    }

    function getLoggedInUser($email){

    }

    function logout(){
        session_destroy();
    }
}
?>