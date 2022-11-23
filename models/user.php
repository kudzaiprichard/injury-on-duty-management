<?php
class User{
    private $id;
    private $firstName;
    private $lastName;
    private $ecNumber;
    private $designation;
    private $email;
    private $password;

    function __construct($id, $firstName, $lastName, $ecNumber, $designation, $email, $password){
        $this->id = $id;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->ecNumber = $ecNumber;
        $this->designation = $designation;
        $this->email = $email;
    }

    function getId() {return $this->id;}
    function getFirstName() {return $this->firstName;}
    function getLastName() {return $this->lastName;}
    function getECNumber() {return $this->ecNumber;}
    function getDesignation() {return $this->designation;}
    function getEmail() {return $this->email;}
    function getPassword() {return $this->password;}

    function setId($id) {$this->id=$id;}
    function setFirstName($firstName) {$this->firstName=$firstName;}
    function setLastName($lastName) {$this->lastName=$lastName;}
    function setECNumber($ecNumber) {$this->ecNumber=$ecNumber;}
    function setDesignation($designation) {$this->designation=$designation;}
    function setEmail($email) {$this->email=$email;}
    function setPassword($password) {$this->password=$password;}

    
}

?>