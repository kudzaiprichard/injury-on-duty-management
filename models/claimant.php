<?php
class Claimant{
    private $id;
    private $name;
    private $nationalId;
    private $ecNumber;
    private $department;

    function __construct($id, $name, $nationalId, $ecNumber, $department){
        $this->id = $id;
        $this->name = $name;
        $this->nationalId = $nationalId;
        $this->ecNumber = $ecNumber;
        $this->department = $department;
    }

    function getId(){return $this->id;}
    function getName(){return $this->name;}
    function getNationalId(){return $this->nationalId;}
    function getECNumber(){return $this->ecNumber;}
    function getDepartment(){return $this->department;}

    function setId($id){$this->id=$id;}
    function setName($name){$this->name=$name;}
    function setNationalId($nationalId){$this->nationalId=$nationalId;}
    function setECNumber($ecNumber){$this->ecNumber=$ecNumber;}
    function setDepartment($department){$this->department=$department;}
    
}
?>