<?php 
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();
$folders = $userController->fetchAllFolders();
?>
<div class="container card">
    <h6 class="p-2 mt-3">Folders including valid documents</h6>
    <hr>
    <div class="row">
        <?php
        $count = 1;
            foreach($folders as $folder){
                echo '
                    <div class="col-4 p-3">
                        <form action="document/request-folder-files.php">
                            <button class="text-muted btn nav-link type="submit" name="submit">
                            <input type="number" value="'.$folder->getId().'" name="folder_id" class="visually-hidden">
                            <input type="number" value="'.$folder->getClaimant()->getId().'" name="claimant_id" class="visually-hidden">
                                <div class="card" >
                                    <svg class="nav-icon shadow rounded-bottom" >
                                        <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-folder"></use>
                                    </svg> 
                                    <div class="card-body">
                                    <h6 class="card-title"><small>#'.$count++.'</small></h6>
                                        <h6 class="card-title"><small>'.$folder->getClaimant()->getFirstName().' '.$folder->getClaimant()->getLastName().'</small></h6>
                                        <h6 class="card-subtitle mb-2 text-muted "><small>'.$folder->getClaimant()->getEcNumber().'</small></h6>
                                    </div>
                                </div>
                            </button>
                        </form>
                    </div> 
                ';
            }
        ?>
    </div>
</div>



