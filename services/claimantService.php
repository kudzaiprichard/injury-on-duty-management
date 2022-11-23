<?php
define('MODELSCLAIMANT',$_SERVER['DOCUMENT_ROOT']."/fms/models/");
require_once(MODELSCLAIMANT.'claimant.php');

class ClaimantService{
    private $db;
    function __construct(){$this->db = new Connection('localhost','root','','fms_db');}

    function createClaimant($firstName,$lastName,$nationalId,$ecNumber,$department){
        $claimants = array();
        $con = $this->db->openConnection();
        $query  = "INSERT INTO `claimant`(`first_name`, `last_name`, `national_id`, `ec_number`, `department`)
                                    VALUES('$firstName','$lastName','$nationalId','$ecNumber','$department') ";

        $query2 = "SELECT * FROM `claimant` WHERE `ec_number` = '$ecNumber'";
        $result2 = mysqli_query($con, $query2); 
        $rows = mysqli_num_rows($result2); 

        if ($rows == 0) {
            if($result = mysqli_query($con, $query)){
                $query1 = "SELECT * FROM `claimant` WHERE `ec_number` = '$ecNumber'";
                $result1 = mysqli_query($con, $query1);
    
                while($row = $result1->fetch_assoc()) {
                    $claimant = new Claimant($row['id'],$row['first_name'],$row['last_name'],$row['national_id'],$row['ec_number'],$row['department']);
                    array_push($claimants, $claimant);
                    unset($claimant);
                }
            }
        }else{
            $query1 = "SELECT * FROM `claimant` WHERE `ec_number` = '$ecNumber'";
            $result1 = mysqli_query($con, $query1);

            while($row = $result1->fetch_assoc()) {
                $claimant = new Claimant($row['id'],$row['first_name'],$row['last_name'],$row['national_id'],$row['ec_number'],$row['department']);
                array_push($claimants, $claimant);
                unset($claimant);
            }
        }

        return $claimants[0];
    }

    function updateClaimant($id,$firstName,$lastName,$nationalId,$ecNumber,$department){
        $isUpdated = false;
        $con = $this->db->openConnection();
        $query = "UPDATE `claimant` SET `first_name`='$firstName', `last_name`='$lastName', `national_id` = '$nationalId', 
                                        `ec_number`='$ecNumber', `department`='$department' WHERE `id`='$id'";

        if($result = mysqli_query($con, $query)){
            $isUpdated = true;
        }

        return $isUpdated;
    }

    function fetchAllClaimants(){
        $claimants = array();
        $con = $this->db->openConnection();
        $query1 = "SELECT * FROM `claimant`";
        $result1 = mysqli_query($con, $query1);
        
        while($row = $result1->fetch_assoc()) {
            $claimant = new Claimant($row['id'],$row['first_name'],$row['last_name'],$row['national_id'],$row['ec_number'],$row['department']);
            array_push($claimants, $claimant);
            unset($claimant);
        }
        
        return $claimants;
    }

    function fetchClaimantById($claimant_id){
        $claimants = array();
        $con = $this->db->openConnection();
        $query1 = "SELECT * FROM `claimant` WHERE `id` = '$claimant_id'";
        $result1 = mysqli_query($con, $query1);
        
        while($row = $result1->fetch_assoc()) {
            $claimant = new Claimant($row['id'],$row['first_name'],$row['last_name'],$row['national_id'],$row['ec_number'],$row['department']);
            array_push($claimants, $claimant);
            unset($claimant);
        }
        
        return $claimants[0];
    }
}
?>