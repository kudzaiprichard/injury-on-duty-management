<?php 
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

$users = $userController->fetchAllUsers();
$user_admin = $userController->getLoggedInUser($_SESSION["email"]);
?>

<div class="container">
    <div class="row">
        <div class="col p-4 card ">
            <div>
                <span><big><b>List of users</b></big></span>
                <a class="btn btn-secondary float-end" href="temp.php?page=admin/print-user">Print Users</a>
                <a class="btn btn-success float-end" href="#" role="button" data-toggle="modal" data-target="#modelId">ADD USER</a>
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
                                }else{echo'<td><span class="badge bg-success p-2">completed</span></td>';}
                                
                                if($user->getPassword() == null || $user->getPassword() == ' ' || $user_admin->getEmail() == "admin@gmail.com"){
                                    echo'
                                            <td>
                                                <form action="admin/route.php">
                                                <input class="visually-hidden" type="number" name="id" value="'.$user->getId().'"/>
                                                    <div class="dropdown open">
                                                        <a type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span>
                                                            <svg class="icon  text-muted">
                                                                <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                            </svg>
                                                        </span>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                                                            <button class="dropdown-item" name="edit" type="submit">Edit</button>
                                                            <button class="dropdown-item" name="delete" type="submit">Delete</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    ';
                                }
                                
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
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-centered modal-md " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Create a new user</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
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
                    <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" value="submit" name="create" class="btn btn-success">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
</script>

