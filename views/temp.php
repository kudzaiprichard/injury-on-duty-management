
<?php
	session_start();
  if(!isset($_SESSION['email'])){header('location: ../auth/login.php');}
?>

<?php include('includes/header-temp.inc.php'); ?>

<style>
	body{
        background: #80808045;
  }
</style>

  <body>
    <?php include 'includes/topbar.inc.php' ?>
    <?php include 'includes/navbar.inc.php' ?>

    <main id="view-panel" >
        <?php
          if(isset($_GET['page'])){
            $page = $_REQUEST['page'];
          } else{$page = $_SESSION["page"];}
          
          include $page.'.php' 
        ?>
        <div class="d-grid gap-2">
          <button type="button" name="" id="" class="btn btn-primary">Button</button>
        </div>
    </main>


  </body>
</html>