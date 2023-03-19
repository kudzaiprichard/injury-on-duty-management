<?php 
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$claims = $userController->fetchAllClaims();

?>

<div class="tab-content rounded-bottom card">
    <div class="p-3 m-3">
        <div>
            <span><big><b>Print list of claims</b></big></span>
        </div>
        <hr>
        <br>
        <table class="table table-striped table-bordered" style="width:100%"  id="datatable-buttons">
            <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>EC Number</th>
                <th>Injury Type</th>
                <th>Place</th>
                <th>Date</th>
                <th>Stage</th>
                <th>Status</th>
                <th>Reference ID</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $count = 1;
                foreach($claims as $claim){
                    echo '
                    <tr>
                        <td>'.$count++.'</td>
                        <td scope="row">'.$claim->getClaimant()->getFirstName().' '.$claim->getClaimant()->getLastName().'</td>
                        <td>'.$claim->getClaimant()->getEcNumber().'</td>
                        <td>'.$claim->getType().'</td>
                        <td>'.$claim->getPlace().'</td>
                        <td>'.$claim->getDate().'</td>
                        <td>'.$claim->getStage().'</td>
                        <td>'.$claim->getStatus().'</td>
                        <td>'.$claim->getReference().'</td>
                    </tr>
                    ';
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
