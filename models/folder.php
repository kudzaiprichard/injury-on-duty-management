<?php
class Folder{
    private $id;
    private $claimant;

    function __construct($id, $claimant){
        $this->id = $id;
        $this->claimant = $claimant;
    }

    function getId(){return $this->id;}
    function getClaimant(){return $this->claimant;}

    function setId($id) {$this->id = $id;}
    function setClaimant($claimant) {$this->claimant = $claimant;}
}
?>