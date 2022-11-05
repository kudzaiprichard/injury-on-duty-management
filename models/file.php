<?php
class File{
    private $file;
    private $claimant;

    function __construct($file,$claimant){
        $this->file = $file; 
        $this->claimant = $claimant;
    }

    function getFile(){return $this->file;}
    function getClaimant(){return $this->claimant;}

    function setFile($file){$this->file=$file;}
    function setClaimant($claimant){$this->claimant=$claimant;}
}
?>