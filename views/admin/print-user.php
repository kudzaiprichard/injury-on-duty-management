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
                <span><big><b>Print list of users</b></big></span>
            </div>
            <hr><br>
            <table class="table table-striped table-bordered" style="width:100%"  id="datatable-buttons">
                <thead>
                <tr>
                    <th>#</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>EC Number</th>
                    <th>Designation</th>
                    <th>Email</th>
                    <th>Registration</th>
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