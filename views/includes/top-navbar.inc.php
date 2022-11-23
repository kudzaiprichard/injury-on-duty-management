<?php
define('CONTROLLERS',$_SERVER['DOCUMENT_ROOT']."/fms/controllers/");
require_once(CONTROLLERS.'userController.php');
$userController = new UserController();
$user = $userController->getLoggedInUser($_SESSION['email']);
?>
<header class="header header-sticky mb-4">
	<div class="container-fluid">
		<button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
	<svg class="icon icon-lg">
		<use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
	</svg>
	</button>
		<a class="header-brand d-md-none" href="#">
			<svg width="118" height="46" alt="CoreUI Logo">
				<use xlink:href="../assets/brand/coreui.svg#full"></use>
			</svg>
		</a>


		<ul class="header-nav ms-3">
			<li class="nav-item dropdown">

				<a class="nav-link py-0" data-coreui-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
					<span class="m-3"><?php echo $user->getEmail(); ?></span>
					<div class="avatar avatar-md"><img class="avatar-img" src="../assets/img/avatars/8.jpg"></div>
				</a>

				<div class="dropdown-menu dropdown-menu-end pt-0">
			
					<div class="dropdown-header bg-light py-2">
						<div class="fw-semibold">Account</div>
					</div>

					<a class="dropdown-item" href="temp.php?page=admin/profile">
						<svg class="icon me-2">
							<use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-contact"></use>
						</svg> Profile
					</a>

					<a class="dropdown-item" href="temp.php?page=admin/users">
						<svg class="icon me-2">
							<use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-people"></use>
						</svg> Users
					</a>

					<div class="dropdown-divider"></div>

					<a class="dropdown-item" href="../views/auth/logout.php">
						<svg class="icon me-2">
							<use xlink:href="../vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
						</svg> Logout
					</a>
				</div>
			</li>
		</ul>
	</div>
	<div class="header-divider"></div>
	<?php
		if(isset($_GET['page'])){
			$page = $_REQUEST['page'];
		} else{$page = $_SESSION["page"];}

		if($page == "admin/profile"){
			echo '
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<span>Dashboard</span>
						</li>
						<li class="breadcrumb-item active"><span>Profile</span></li>
					</ol>
				</nav>
			</div>
			';
		}

		if($page == "admin/users"){
			echo '
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<span>Dashboard</span>
						</li>
						<li class="breadcrumb-item active"><span>Users</span></li>
					</ol>
				</nav>
			</div>
			';
		}

		if($page == "claimant/claimant"){
			echo '
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<span>Claims</span>
						</li>
						<li class="breadcrumb-item active"><span>Claimants</span></li>
					</ol>
				</nav>
			</div>
			';
		}

		if($page == "claim/claim"){
			echo '
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<span>Claims</span>
						</li>
						<li class="breadcrumb-item active"><span>Claims</span></li>
					</ol>
				</nav>
			</div>
			';
		}

		if($page == "document/document"){
			echo '
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<span>Claims</span>
						</li>
						<li class="breadcrumb-item active"><span>Folders</span></li>
					</ol>
				</nav>
			</div>
			';
		}

		if($page == "document/folder"){
			echo '
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<span>Claims</span>
						</li>
						<li class="breadcrumb-item active"><span>Files</span></li>
					</ol>
				</nav>
			</div>
			';
		}

		if($page == "claimant/claimant-details"){
			echo '
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<span>Claimant</span>
						</li>
						<li class="breadcrumb-item active"><span>Details</span></li>
					</ol>
				</nav>
			</div>
			';
		}

		if($page == "claim/claim-details"){
			echo '
			<div class="container-fluid">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb my-0 ms-2">
						<li class="breadcrumb-item">
							<span>Claim</span>
						</li>
						<li class="breadcrumb-item active"><span>Details</span></li>
					</ol>
				</nav>
			</div>
			';
		}
	?>
</header>