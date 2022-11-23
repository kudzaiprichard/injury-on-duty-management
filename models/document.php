<?php
class Document{
    private $id;
    private $name;
    private $file;
    private $timestamp;
    private $claimant;

    function __construct($id,$name,$file,$timestamp,$claimant){
        $this->id = $id;
        $this->name = $name;
        $this->file = $file; 
        $this->timestamp = $timestamp;
        $this->claimant = $claimant;
    }

    function getId(){return $this->id;}
    function getName(){return $this->name;}
    function getTimestamp(){return $this->timestamp;}
    function getFile(){return $this->file;}
    function getClaimant(){return $this->claimant;}

    function setId($id){$this->id = $id;}
    function setName($name){$this->name = $name;}
    function setFile($file){$this->file=$file;}
    function setTimestamp($timestamp){$this->timestamp = $timestamp;}
    function setClaimant($claimant){$this->claimant=$claimant;}
}
?>