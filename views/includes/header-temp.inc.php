
<?php 
    if(isset($_GET['page'])){
        $page = $_REQUEST['page'];
    } else{$page = $_SESSION["page"];}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">

<title>Injury On Duty | 
<?php if($page == "claim/claim-details"
        || $page == "claim/claim"
        || $page == "claim/claim-print"
        || $page == "claim/claim-details"
        || $page == "claim/claim"
        || $page == "claim/claim-print"){echo "Claims";}

    elseif($page == "claimant/claimant-details"
        || $page == "claimant/claimant" 
        || $page == "claimant/print-claimant"){echo "Claimants";}

    elseif( $page == "document/update-file" 
        || $page == "document/document"
        || $page == "document/folder"){echo "Files";}

    elseif($page == "admin/profile"){echo "Profile";}

    elseif($page == "admin/users"
        || $page == "admin/edit-user"
        || $page == "admin/print-user"){echo "Users";}
        ?>
</title>

    <link rel="stylesheet" href="../assets/vendors/simplebar/css/simplebar.css">
    <link rel="stylesheet" href="../assets/css/vendors/simplebar.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
    <link href="../assets/css/examples.css" rel="stylesheet">
    <link href="../assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/vendors/nprogress/nprogress.css" rel="stylesheet">
    <link href="../assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendors/custom.min.css" rel="stylesheet">

    
</head>

