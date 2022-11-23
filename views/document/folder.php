<?php 
define('CONTROLLERS1',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS1.'userController.php');
$userController = new UserController();

if($_SESSION["v_claimant_id"]){
    $files = $userController->fetchAllFilesByFolderId($_SESSION["folder_id"], $_SESSION["v_claimant_id"]);
    $claimant = $userController->fetchClaimantById($_SESSION["v_claimant_id"]);
} 
else{
    $files = $userController->fetchAllFilesByFolderId($_SESSION["folder_id"], $_SESSION["claimant_id"]);
    $claimant = $userController->fetchClaimantById($_SESSION["claimant_id"]);
}
?>
<div class="container card">
    <div class="row px-4 pt-3">
        <?php echo '
            <div class="col-10">
                <h6>Files for '.$claimant->getLastName().' '.$claimant->getFirstName().'</h6>
            </div>
        ';?>
        <div class="col float-end">
            <a class="btn btn-primary " href="#" role="button" data-bs-toggle="modal" data-bs-target="#modalId">ADD FILE</a>
        </div>
    </div>
<hr>
    <div class="row">
        <?php
            if(!empty($files)){
                echo '
                    <div class="px-5 mt-2 bg-dark text-white"><span>18th November 2022</span></div>
                ';
                foreach($files as $file){
                    echo '
                        <div class="col-3 p-3">
                            <div href="#" class="text-muted nav-link">
                                <div class="card" >
                                    <svg class="nav-icon shadow rounded-bottom p-3" >
                                        <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                                    </svg> 
                                    <div class="card-body">
                                    <div class="row">
                                    <div class="col-9">
                                        <h6 class="card-title">'.$file->getName().'</h6>
                                        <h6 class="card-title"><small>'.date('dS F Y', strtotime($file->getTimestamp())).'</small></h6>
                                    </div>
                                        <div class="dropdown open col">
                                            <form action="document/route.php">
                                                <input name="id" class="visually-hidden" value="'.$file->getId().'"/>
                                                <a type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"aria-expanded="false">
                                                    <span>
                                                        <svg class="icon  text-muted">
                                                            <use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                                        </svg>
                                                    </span>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="triggerId">
                                                    <a class="dropdown-item" href="../uploads/'.$file->getFile().'" download="'.$file->getFile().'"><small>Download</small></a>
                                                    <button type="submit" class="dropdown-item" name="delete" >Delete</button>
                                                    <button type="submit" class="dropdown-item" name="edit">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    ';
                }
            }

            if(empty($files)){
                echo '
                <div class="alert alert-danger alert-dismissible fade show mt-5 p-3" role="alert" id="alert-div">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>UPLOAD CLAIMANTS RELEVANT DOCUMENTS FOR CLAIM PROCESSING</strong> 
                </div>
                ';
            }
        ?>
    </div>
</div>

<script>
    var alertList = document.querySelectorAll('.alert');
    alertList.forEach(function (alert) {
    new bootstrap.Alert(alert)
    });
</script>
<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md" role="document">
    <form class="row g-3 needs-validation" action="document/upload.php" method="post" enctype="multipart/form-data" novalidate>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Upload Pdf documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <div class="modal-body row">
                <div class="col-12">
                    <div class="">
                        <label for="validationCustom03" class="form-label">File Name</label>
                        <input type="text" class="form-control" id="validationCustom03" name="name" required>
                    </div>
                </div>

                <div class="col-12">
                    <div class="">
                        <label for="validationCustom03" class="form-label">choose file</label>
                        <input class="form-control" type="file" name="file" id="invalidCheck" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"  name="upload">Upload</button>
            </div>
        </div>
    </form>
    </div>
</div>


<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)

</script>