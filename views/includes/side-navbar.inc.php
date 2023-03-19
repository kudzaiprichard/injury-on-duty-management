<?php 
    if(isset($_GET['page'])){
        $page = $_REQUEST['page'];
    } else{$page = $_SESSION["page"];}
?> 

<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
        <!-- Place the system logo -->
        <div class="sidebar-brand d-none d-md-flex" >
            <div align="center" class="mr-4">
                
                <h2>Injury On Duty</h2>
            </div>
        </div>

        <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
            <li class="nav-title">Dashboard</li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == "admin/profile"){echo "active";}?>"
                                            href="temp.php?page=admin/profile">
                    <svg class="nav-icon">
                <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-contact"></use>
            </svg> Profile</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if($page == "admin/users"
                                    || $page == "admin/edit-user"
                                    || $page == "admin/print-user"){echo "active";}?>"
                                    href="temp.php?page=admin/users">
                    <svg class="nav-icon">
                <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-people"></use>
            </svg> Users</a>
            </li>

            <li class="nav-title">Claims</li>
            <li class="nav-item">
                <a class="nav-link <?php if($page == "claimant/claimant-details"
                                    || $page == "claimant/claimant" 
                                    || $page == "claimant/print-claimant"){echo "active";}?>"
                                    href="temp.php?page=claimant/claimant">
                    <svg class="nav-icon">
                <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-user-follow"></use>
            </svg> Claimants</a>
            </li>

            <li class="nav-item">
                <a class="nav-link <?php if($page == "claim/claim-details"
                                    || $page == "claim/claim"
                                    || $page == "claim/claim-print"){echo "active";}?>" 
                                    href="temp.php?page=claim/claim">
                    <svg class="nav-icon">
                <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-copy"></use>
            </svg> Claims</a>
            </li>

            <li class="nav-item">
            <a class="nav-link <?php if($page == "document/update-file" 
                                    || $page == "document/document"
                                    || $page == "document/folder"){echo "active";}?>"
                                    href="temp.php?page=document/document">
                <svg class="nav-icon">
                    <use xlink:href="../assets/vendors/@coreui/icons/svg/free.svg#cil-folder-open"></use>
                </svg> Docs
            </a>
        </li>
        </ul>
        <a class="sidebar-toggler" href="#"></a>
    </div>

