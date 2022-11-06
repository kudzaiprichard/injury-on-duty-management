<?php
define('SERVICES',$_SERVER['DOCUMENT_ROOT']."/fms/services/");
require_once('connection.php');
require_once(SERVICES.'authService.php');

class UserController{
    private $authService;

    function __construct(){
        $this->authService = new AuthService();
    }

    function login($email, $password){
        return $this->authService->login($email, $password);
    }
}
?>