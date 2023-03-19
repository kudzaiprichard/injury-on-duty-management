<?php
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$user = $userController->getUserById($_SESSION["v_user_id"]);
?>
<section>
    <div class="container">
        <div class="row">
        <h6>User Details</h6>
            <div class="col ">
                <section class="row card p-3 m-3">
                    <div class="col-12 mt-3">
                        <label for="validationCustom03" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $user->getFirstName();?>" disabled>
                    </div> 
                    <div class="col-12 mt-3">
                        <label for="validationCustom03" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $user->getLastName();?>" disabled>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="validationCustom03" class="form-label">Email Address</label>
                        <input type="text" class="form-control" value="<?php echo $user->getEmail();?>" disabled>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="validationCustom03" class="form-label">EC Number</label>
                        <input type="text" class="form-control" value="<?php echo $user->getEcNumber();?>" disabled>
                    </div>
                    <div class="col-12 mt-3">
                        <label for="validationCustom03" class="form-label">Designation</label>
                        <input type="text" class="form-control" value="<?php echo $user->getDesignation();?>" disabled>
                    </div>
                </section>
            </div>

            <div class="col ">
                <form action="admin/add-user.php" class="">
                    <section class="row card p-3 m-3">
                        <h6>
                            <span>
                                <svg class="icon">
                                    <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                </svg>
                            </span>
                            Edit User
                        </h6>
                        <input type="number" class="form-control visually-hidden" id="validationCustom03" name="id" value="<?php echo $user->getId();?>" >
                        <div class="col-12 mt-3">
                            <label for="validationCustom03" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="validationCustom03" name="first_name" value="<?php echo $user->getFirstName();?>" >
                        </div> 
                        <div class="col-12 mt-3">
                            <label for="validationCustom03" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="validationCustom03" name="last_name" value="<?php echo $user->getLastName();?>" >
                        </div>
                        <div class="col-12 mt-3">
                            <label for="validationCustom03" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="validationCustom03" name="email" value="<?php echo $user->getEmail();?>" >
                        </div>
                        <div class="col-12 mt-3">
                            <label for="validationCustom03" class="form-label">EC Number</label>
                            <input type="text" class="form-control" id="validationCustom03" name="ec_number" value="<?php echo $user->getEcNumber();?>" >
                        </div>
                        <div class="col-12 mt-3">
                            <label for="validationCustom03" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="validationCustom03" name="designation" value="<?php echo $user->getDesignation();?>" >
                        </div>
                        <div class="col-12 my-2 mt-4">
                            <button type="submit" value="submit" name="update" class="btn btn-secondary float-end">Update User</button>
                        </div>
                    </section>
                </form>
            </div>
            
        </div>
    </div>
</section>
