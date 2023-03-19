<?php
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$claim = $userController->fetchClaimById($_SESSION["v_claim_id"]);
?>
<section>
    <div class="container">
        <h6>Claim for : 
            <?php 
                echo $claim->getClaimant()->getLastName();
                echo ' ';
                echo $claim->getClaimant()->getFirstName();
            ?>
            <i>, <?php echo $claim->getClaimant()->getEcNumber();?></i>
        </h6>
        <div class="row">
            <div class="col ">
                <section class="row card p-3 m-3">
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Injury Type</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claim->getType(); ?>"required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Place</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claim->getPlace(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Date</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claim->getDate(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Status</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claim->getStatus(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Stage</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claim->getStage(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Reference ID</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claim->getReference(); ?>" required disabled>
                    </div>
                </section>
            </div>

            <div class="col ">
                <form action="claim/update-claim.php" class="">
                    <section class="row card p-3 m-3">
                        <h6>
                            <span>
                                <svg class="icon">
                                    <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                </svg>
                            </span>
                            Edit Claim Details
                        </h6>
                        <div class="col-12 visually-hidden">
                            <input type="number" class="form-control" name="id" id="validationCustom03" value="<?php echo $claim->getId(); ?>"required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">Injury Type</label>
                            <input type="text" class="form-control" name="injury_type" id="validationCustom03" value="<?php echo $claim->getType(); ?>"required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">Place</label>
                            <input type="text" class="form-control" name="place" id="validationCustom03" value="<?php echo $claim->getPlace(); ?>" required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">Date</label>
                            <input type="text" class="form-control" name="date" id="validationCustom03" value="<?php echo $claim->getDate(); ?>" required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">Status</label>
                            <input type="text" class="form-control" name="status" id="validationCustom03" value="<?php echo $claim->getStatus(); ?>" required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">Stage</label>
                            <input type="text" class="form-control" name="stage" id="validationCustom03" value="<?php echo $claim->getStage(); ?>" required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">Reference ID</label>
                            <input type="text" class="form-control" name="reference_id" id="validationCustom03" value="<?php echo $claim->getReference(); ?>" required>
                        </div>

                        <div class="col-12 my-2 mt-2">
                            <button type="submit" value="submit" name="update-claim" class="btn btn-primary">Update</button>
                        </div>
                    </section>
                </form>
            </div>
            
        </div>
    </div>
</section>
<script>
    var alertList = document.querySelectorAll('.alert');
    alertList.forEach(function (alert) {
    new bootstrap.Alert(alert)
    })
</script>