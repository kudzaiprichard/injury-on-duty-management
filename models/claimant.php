<?php
class Claimant{
    private $id;
    private $firstName;
    private $lastName;
    private $nationalId;
    private $ecNumber;
    private $department;

    function __construct($id, $firstName, $lastName, $nationalId, $ecNumber, $department){
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->nationalId = $nationalId;
        $this->ecNumber = $ecNumber;
        $this->department = $department;
    }

    function getId(){return $this->id;}
    function getFirstName(){return $this->firstName;}
    function getLastName(){return $this->lastName;}
    function getNationalId(){return $this->nationalId;}
    function getECNumber(){return $this->ecNumber;}
    function getDepartment(){return $this->department;}

    function setId($id){$this->id=$id;}
    function setFirstName($firstName){$this->firstName = $firstName;}
    function setLastName($lastName){$this->lastName = $lastName;}
    function setNationalId($nationalId){$this->nationalId=$nationalId;}
    function setECNumber($ecNumber){$this->ecNumber=$ecNumber;}
    function setDepartment($department){$this->department=$department;}
    
}
?>