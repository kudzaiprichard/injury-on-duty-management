<?php
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$claimant = $userController->fetchClaimantById($_SESSION["v_claimant_id"]);
?>
<section>
    <div class="container">
        <div class="row">
            <div class="col ">
                <section class="row card p-3 m-3">
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claimant->getFirstName(); ?>"required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claimant->getLastName(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">National ID</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claimant->getNationalId(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">EC Number</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claimant->getEcNumber(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Department</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $claimant->getDepartment(); ?>" required disabled>
                    </div>
                </section>
            </div>

            <div class="col ">
                <form action="claimant/update-claimant.php">
                    <section class="row card p-3 m-3">
                        <h6>
                            <span>
                                <svg class="icon">
                                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                </svg>
                            </span>
                            Edit Claimant Details
                        </h6>
                        <div class="col-12 visually-hidden">
                            <input type="text" class="form-control" name="id" id="validationCustom03" value="<?php echo $claimant->getId(); ?>"required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" id="validationCustom03" value="<?php echo $claimant->getFirstName(); ?>"required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="validationCustom03" value="<?php echo $claimant->getLastName(); ?>" required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">National ID</label>
                            <input type="text" class="form-control" name="national_id" id="validationCustom03" value="<?php echo $claimant->getNationalId(); ?>" required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">EC Number</label>
                            <input type="text" class="form-control" name="ec_number" id="validationCustom03" value="<?php echo $claimant->getEcNumber(); ?>" required>
                        </div>
                        <div class="col-12 my-2">
                            <label for="validationCustom03" class="form-label">Department</label>
                            <input type="text" class="form-control" name="department" id="validationCustom03" value="<?php echo $claimant->getDepartment(); ?>" required>
                        </div>

                        <div class="col-12 my-2 mt-2">
                            <button type="submit" value="submit" name="update-claimant" class="btn btn-primary">Update</button>
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