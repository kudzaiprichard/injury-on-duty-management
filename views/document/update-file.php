<?php
if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
// define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'userController.php');

$userController = new UserController();
$file = $userController->getFileById($_SESSION["f_file_id"]);

?>
<div class="container">
    <div class="row">
        <div class="col">
            <form class="row g-3 needs-validation" action="document/upload.php" method="post" enctype="multipart/form-data" novalidate>
                <div class="modal-content">
                    <h6 class="p-1 m-1">Update File</h6><hr>
                    <div class="modal-body row">
                        <div class="col-12">
                            <div class="visually-hidden">
                                <input type="number" name="id" value="<?php echo $file->getId(); ?>" />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="">
                                <label for="validationCustom03" class="form-label">File Name</label>
                                <input type="text" class="form-control" id="validationCustom03" name="name" value="<?php echo $file->getName(); ?>">
                            </div>
                        </div>

                        <div class="col-12 mt-4">
                            <div class="">
                                <label for="validationCustom03" class="form-label">choose file</label>
                                <input class="form-control" type="file" name="file" id="invalidCheck" >
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"  name="update">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>