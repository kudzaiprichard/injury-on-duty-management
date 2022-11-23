<?php 
    class Injury{
        private $id;
        private $type;
        private $place;
        private $date;
        private $stage;
        private $status;
        private $reference;
        private $claimant;

        function __construct($id, $type, $place, $date, $stage, $status,$reference, $claimant){
            $this->id = $id;
            $this->type = $type;
            $this->place = $place;
            $this->date = $date;
            $this->stage = $stage;
            $this->status = $status;
            $this->reference = $reference;
            $this->claimant = $claimant;
        }

        function getId() {return $this->id;}
        function getType() {return $this->type;}
        function getPlace() {return $this->place;}
        function getDate() {return $this->date;}
        function getStage() {return $this->stage;}
        function getStatus() {return $this->status;}
        function getReference() {return $this->reference;}
        function getClaimant() {return $this->claimant;}

        function setId($id) {$this->id = $id;}
        function setType($type) {$this->type = $type;}
        function setPlace($place) {$this->place = $place;}
        function setDate($date) {$this->date=$date;}
        function setStage($stage) {$this->stage=$stage;}
        function setStatus($status) {$this->status=$status;}
        function setReference($reference) {$this->reference=$reference;}
        function setClaimant($claimant) {$this->claimant=$claimant;}
    }
?>