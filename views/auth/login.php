<?php 
	session_start();
	include('../includes/header.inc.php');
?>
<style>
	#alert-div{
		transition: opacity 1s;
	}
</style>

</head>
<body>
	<div class="bg-light min-vh-100 d-flex flex-row align-items-center">
		<div class="container">
		<div class="row justify-content-center">
			<?php
				if(isset($_SESSION["msg"])){
					echo '
					<div class="alert alert-danger alert-dismissible fade show mt-5 p-3" role="alert" id="alert-div">
						<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						<strong>'.$_SESSION["msg"].'</strong> 
					</div>
					';
				}
			?>

			<script>
				var alertList = document.querySelectorAll('.alert');
				alertList.forEach(function (alert) {
				new bootstrap.Alert(alert)
				});

				const target = document.getElementById('alert-div');
				window.onload = setInterval(()=>target.style.opacity = '0', 5000);
			</script>

			<div class="col-lg-8">
				<form action="log-user.php">
					<div class="card-group d-block d-md-flex row">
						
						<div class=" col-md-7 p-4 mb-0">
							<div class="card-body">
								<h1 class="text-success">Login</h1>
								<p class="text-medium-emphasis ">Sign In to your account</p>
								<div class="input-group mb-3"><span class="input-group-text">
									<svg class="icon">
									<use xlink:href="../../vendors/@coreui/icons/svg/free.svg#cil-user"></use>
									</svg></span>
								<input class="form-control" type="email" id="email" name="email" placeholder="Email Address">
								</div>
								<div class="input-group mb-4"><span class="input-group-text">
									<svg class="icon">
									<use xlink:href="../../vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
									</svg></span>
								<input class="form-control" type="password" id="password" name="password" placeholder="Password">
								</div>
								<div class="row">
									<div class="col-6">
										<button  type="submit"  class="btn btn-success px-4" type="button">Login</button>
									</div>
								</div>
							</div>
						</div>
						<div class="card col-md-5 text-white bg-white py-5 shadow-lg">
							<div class="card-body text-center">
								<div>
									<h2 class="text-dark">Sign up</h2>
									<p class=" text-secondary">Not registered!. Click button below to register. <i>NOTE Make sure your email is registered in the system to create account</i></p>
									<a class="btn btn-lg  mt-3 btn-secondary" type="button" href="register.php">Register</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		</div>
	</div>
</body>
</html>