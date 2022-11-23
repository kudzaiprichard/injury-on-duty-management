<?php 
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$claims = $userController->fetchAllClaims();

?>

<div class="tab-content rounded-bottom card">
    <div class="p-3 m-3">
        <div>
            <span><big><b>List of claims</b></big></span>
            <a class="btn btn-primary float-end" href="#" role="button" data-bs-toggle="modal" data-bs-target="#modalId">ADD CLAIM</a>
        </div>
        <hr>
        <br>
        <table class="table table-striped table-bordered" style="width:100%"  id="datatable">
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
                <th></th>
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
                        <td>
                            <form action="claim/route.php">
                            <input type="number" name="claim_id" class="visually-hidden" value="'.$claim->getId().'"/>
                            <input type="number" name="claimant_id" class="visually-hidden" value="'.$claim->getClaimant()->getId().'"/>
                                <div class="dropdown open">
                                    <a type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                                        <span>
                                            <svg class="icon  text-muted">
                                                <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                            </svg>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="triggerId">
                                        <button class="dropdown-item" type="submit" name="view-documents">View Documents</button>
                                        <button class="dropdown-item" type="submit" name="view-claimant">View Claimant</button>
                                        <button class="dropdown-item" type="submit" name="delete">Delete</button>
                                        <button class="dropdown-item" type="submit" name="edit">Edit</button>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                    ';
                }
            ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-md " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Create a new claim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="claim/create-claim.php">
                <div class="modal-body">
                    <section class="row">
                        <h6><u>Enter Claimant Details</u></h6>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="validationCustom03" name="first_name" required>
                        </div>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="validationCustom03" name="last_name" required>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom03" class="form-label">National Id</label>
                            <input type="text" class="form-control" id="validationCustom03" name="national_id" required>
                        </div>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">EC Number</label>
                            <input type="text" class="form-control" id="validationCustom03" name="ec_number" required>
                        </div>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">Department</label>
                            <input type="text" class="form-control" id="validationCustom03" name="department" required>
                        </div>
                    </section>

                    <section class="row mt-4">
                        <h6><u>Enter injury Details</u></h6>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">Type</label>
                            <input type="text" class="form-control" id="validationCustom03" name="type" required>
                        </div>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">Place</label>
                            <input type="text" class="form-control" id="validationCustom03" name="place" required>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom03" class="form-label">date</label>
                            <input type="date" class="form-control" id="validationCustom03" name="date" required>
                        </div>
                        <div class="col">
                            <label for="validationCustom03" class="form-label">Stage</label>
                            <input type="text" class="form-control" id="validationCustom03" name="stage" required>
                        </div>
                        <div class="col">
                            <label for="validationCustom03" class="form-label">Status</label>
                            <input type="text" class="form-control" id="validationCustom03" name="status" required>
                        </div>
                        <div class="col">
                            <label for="validationCustom03" class="form-label">Reference ID</label>
                            <input type="text" class="form-control" id="validationCustom03" name="reference" required>
                        </div>
                    </section>
                    <!-- 
                    <div class="col mt-4">
                        <label for="validationCustom03" class="form-label"><h6><u>Valid Documents</u></h6></label>
                        <input type="file" class="form-control" id="validationCustom03" name="files" required>
                    </div> -->
                </div>
                
                <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
</script>

