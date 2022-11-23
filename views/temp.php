
<?php
	session_start();
  if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
  define('VIEWS',$_SERVER['DOCUMENT_ROOT']."/fms/views/");
?>
<style>
  #alert-div{
    transition: opacity 1s;
  }
</style>

<link rel="stylesheet" href="../css/font-awesome.min.css">
<link href="../css/lineicons.css" rel="stylesheet"/>
<?php include('includes/header-temp.inc.php'); ?>

  <body>
    <?php include 'includes/side-navbar.inc.php' ?>
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
      <?php include 'includes/top-navbar.inc.php' ?>
      <div class="container-fluid p-3">
        <?php
          if(isset($_GET['page'])){
            $page = $_REQUEST['page'];
          } else{$page = $_SESSION["page"];}
          
          include VIEWS.$page.'.php';
        ?>
      </div>
    </div>

    <script>
        const target = document.getElementById('alert-div');
				window.onload = setInterval(()=>target.style.opacity = '0', 5000);
				// window.onload = setInterval(()=>target.style.visibility = 'hidden', 5000);
    </script>

    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <script src="../vendors/nprogress/nprogress.js"></script>
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="../vendors/custom.min.js"></script>
    <script src="../vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
    <script src="../vendors/simplebar/js/simplebar.min.js"></script>
    <script src="../vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
    <script src="../vendors/@coreui/utils/js/coreui-utils.js"></script>
    <script src="../js/main.js"></script>
  </body>
</html>