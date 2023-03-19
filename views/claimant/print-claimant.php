<?php 
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$claimants = $userController->fetchAllClaimants();

?>

<div class="tab-content rounded-bottom card">
    <div class="p-3">
        <h6>Print list of claimants in the system</h6>
        <hr>
        <br>

        <table class="table table-striped table-bordered" style="width:100%"  id="datatable-buttons">
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>National Id</th>
                <th>EC Number</th>
                <th>Department</th>
            </tr>
            </thead>
            <tbody>
                <?php 
                $count = 1;
                foreach($claimants as $claimant){
                    echo '
                        <tr>
                            <td>'.$count++.'</td>
                            <td scope="row">'.$claimant->getFirstName().'</td>
                            <td>'.$claimant->getLastName().'</td>
                            <td>'.$claimant->getNationalId().'</td>
                            <td>'.$claimant->getEcNumber().'</td>
                            <td>'.$claimant->getDepartment().'</td>
                        </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
