<?php
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$user = $userController->getLoggedInUser($_SESSION["email"]);
?>
<section>
    <div class="container">
        <div class="row">
        <h6>My Profile</h6>
            <div class="col ">
                <section class="row card p-3 m-3">
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $user->getFirstName(); ?>"required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $user->getLastName(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $user->getEmail(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">EC Number</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $user->getEcNumber(); ?>" required disabled>
                    </div>
                    <div class="col-12 my-2">
                        <label for="validationCustom03" class="form-label">Designation</label>
                        <input type="text" class="form-control" id="validationCustom03" value="<?php echo $user->getDesignation(); ?>" required disabled>
                    </div>
                </section>
            </div>

            <div class="col ">
                <form action="admin/update-profile.php" class="">
                    <section class="row card p-3 m-3">
                        <h6>
                            <span>
                                <svg class="icon">
                                    <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
                                </svg>
                            </span>
                            Edit Profile
                        </h6>
                        <div class="col-12 my-3 visually-hidden">
                            <input type="text" class="form-control" id="validationCustom03" name="id" value="<?php echo $user->getId(); ?>" required>
                        </div>
                        <div class="col-12 my-3">
                            <label for="validationCustom03" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="validationCustom03" name="first_name" value="<?php echo $user->getFirstName(); ?>" required>
                        </div>
                        <div class="col-12 my-3">
                            <label for="validationCustom03" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="validationCustom03" name="last_name" value="<?php echo $user->getLastName(); ?>" required>
                        </div>
                        <div class="col-12 my-3">
                            <label for="validationCustom03" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="validationCustom03" name="email" value="<?php echo $user->getEmail(); ?>" required>
                        </div>
                        <div class="col-12 my-3">
                            <label for="validationCustom03" class="form-label">EC Number</label>
                            <input type="text" class="form-control" id="validationCustom03" name="ec_number" value="<?php echo $user->getEcNumber(); ?>" required>
                        </div>
                        <div class="col-12 my-3">
                            <label for="validationCustom03" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="validationCustom03" name="designation" value="<?php echo $user->getDesignation(); ?>" required>
                        </div>
                        <div class="col-12 my-3">
                            <label for="validationCustom03" class="form-label">New Password</label>
                            <input type="text" class="form-control" id="validationCustom03" name="password"  placeholder="Enter new password">
                        </div>
                        <div class="col-12 my-3">
                            <label for="validationCustom03" class="form-label">Confirm Password</label>
                            <input type="text" class="form-control" id="validationCustom03" name="confirm_password"  placeholder="Enter confirm password">
                        </div>
                        <div class="col-12 my-2 mt-2">
                            <button type="submit" name="update-profile" value="submit" class="btn btn-success">Update</button>
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