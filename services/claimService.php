<?php
define('MODELSCLAIMS',$_SERVER['DOCUMENT_ROOT']."/fms/models/");
require_once(MODELSCLAIMS.'injury.php');
require_once(MODELSCLAIMS.'claimant.php');

class ClaimService{
    private $db;
    private $claimantService;
    function __construct(){
        $this->db = new Connection('localhost','root','','fms_db');
        $this->claimantService = new ClaimantService();
    }

    function createClaim($type,$place,$date,$stage,$status,$reference,$claimant_id){
        $created = false;
        $con = $this->db->openConnection();
        $query  = "INSERT INTO `injuries`(`type`, `place`, `date`, `stage`, `status`,`reference`, `claimant_id`)
                                    VALUES('$type','$place','$date','$stage','$status','$reference','$claimant_id') ";
        
        if($result = mysqli_query($con, $query)){
            $created = true;
        }

        return $created;
    }

    function updateClaim($id,$injuryType,$place,$date,$stage,$status,$referenceId){
            $isUpdated = false;
            $con = $this->db->openConnection();
        $query = "UPDATE `injuries` SET `type`='$injuryType', `place`='$place', `date`='$date',
                                        `stage`='$stage', `status`='$status', `reference`='$referenceId' 
                                        WHERE `id`='$id'";
        if(mysqli_query($con, $query)){
            $isUpdated = true;
        }

        return $isUpdated;
    }

    function fetchAllClaims(){
        $con = $this->db->openConnection();
        $claims = array();
        $query = "SELECT * FROM `injuries` ";
        $result = mysqli_query($con, $query);

        while($row = $result->fetch_assoc()) {
            $query1 = "SELECT * FROM `claimant` WHERE `id` = '".$row['claimant_id']."'";
            $result1 = mysqli_query($con, $query1);

            while($row1 = $result1->fetch_assoc()) {
                $claimant = new Claimant($row1['id'],$row1['first_name'],$row1['last_name'],$row1['national_id'],$row1['ec_number'],$row1['department']);

                $claim = new Injury($row['id'],$row['type'],$row['place'],$row['date'],$row['stage'],$row['status'],$row['reference'],$claimant);
                array_push($claims, $claim);
                unset($claim);
            }
        }

        return $claims;
    }

    function fetchClaimById($id){
        $con = $this->db->openConnection();
        $claims = array();
        $query = "SELECT * FROM `injuries` WHERE `id` = '$id'";
        $result = mysqli_query($con, $query);

        while($row = $result->fetch_assoc()) {
            $query1 = "SELECT * FROM `claimant` WHERE `id` = '".$row['claimant_id']."'";
            $result1 = mysqli_query($con, $query1);

            while($row1 = $result1->fetch_assoc()) {
                $claimant = new Claimant($row1['id'],$row1['first_name'],$row1['last_name'],$row1['national_id'],$row1['ec_number'],$row1['department']);

                $claim = new Injury($row['id'],$row['type'],$row['place'],$row['date'],$row['stage'],$row['status'],$row['reference'],$claimant);
                array_push($claims, $claim);
                unset($claim);
            }
        }

        return $claims[0];
    }

    function deleteClaimById($claimId){
        $isDeleted = false;
        $con = $this->db->openConnection();
        $query = "DELETE FROM `injuries` WHERE `id` = '$claimId'";

        if($result = mysqli_query($con, $query)){
            $isDeleted = true;
        }

        return $isDeleted;
    }
}
?>