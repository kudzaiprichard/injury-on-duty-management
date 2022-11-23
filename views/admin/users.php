<?php 
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$users = $userController->fetchAllUsers();

?>

<div class="container">
    <div class="row">
        <div class="col p-4 card ">
            <div>
                <span><big><b>List of users</b></big></span>
                <a class="btn btn-primary float-end" href="#" role="button" data-bs-toggle="modal" data-bs-target="#modalId">ADD USER</a>
            </div>
            <hr><br>
            <table class="table table-striped table-bordered" style="width:100%"  id="datatable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>EC Number</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Registration</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $count = 1;
                    foreach ($users as $user){
                        if($user->getEmail() != "admin@gmail.com"){
                            echo '
                                <tr>
                                    <td>'.$count++.'</td>
                                    <td scope="row">'.$user->getFirstName().'</td>
                                    <td>'.$user->getLastName().'</td>
                                    <td>'.$user->getEcNumber().'</td>
                                    <td>'.$user->getDesignation().'</td>
                                    <td>'.$user->getEmail().'</td>
                                    ';
                                    if($user->getPassword() == null || $user->getPassword() == ' '){
                                        echo'<td><span class="badge bg-warning p-2">incomplete</span></td>';
                                    }else{echo'<td><span class="badge bg-primary p-2">completed</span></td>';}
                                    echo'
                                    <td>
                                        <div class="dropdown open">
                                            <a type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                                            <span>
                                                <svg class="icon  text-muted">
                                                    <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                </svg>
                                            </span>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="triggerId">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            ';
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-md " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Create a new user</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="admin/add-user.php">
                <div class="modal-body">
                    <section class="row">
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="validationCustom03" name="first_name" required>
                        </div>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="validationCustom03" name="last_name" required>
                        </div>
                        <div class="col-12">
                            <label for="validationCustom03" class="form-label">Email Address</label>
                            <input type="text" class="form-control" id="validationCustom03" name="email" required>
                        </div>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">EC Number</label>
                            <input type="text" class="form-control" id="validationCustom03" name="ec_number" required>
                        </div>
                        <div class="col-6">
                            <label for="validationCustom03" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="validationCustom03" name="designation" required>
                        </div>
                    </section>
                </div>
                
                <div class="modal-footer">
                    <button type="button"  class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" value="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
</script>

