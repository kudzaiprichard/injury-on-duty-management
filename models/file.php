<?php
class File{
    private $id;
    private $file;
    private $claimant;

    function __construct($file,$claimant,$id){
        $this->id = $id;
        $this->file = $file; 
        $this->claimant = $claimant;
    }

    function getId(){return $this->id;}
    function getFile(){return $this->file;}
    function getClaimant(){return $this->claimant;}

    function setId($id){$this->id = $id;}
    function setFile($file){$this->file=$file;}
    function setClaimant($claimant){$this->claimant=$claimant;}
}
?>