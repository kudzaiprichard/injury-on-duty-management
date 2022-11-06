<?php 
	include('../includes/header.inc.php');
?>

</head>
<style>
	body{
		width: 100%;
	    height: calc(100%);
	    /*background: #007bff;*/
	}
	main#main{
		width:100%;
		height: calc(100%);
		background:white;
	}
	#login-right{
		position: absolute;
		right:0;
		width:40%;
		height: calc(100%);
		background:white;
		display: flex;
		align-items: center;
	}
	#login-left{
		position: absolute;
		left:0;
		width:60%;
		height: calc(100%);
		background:#00000061;
		display: flex;
		align-items: center;
	}
	#login-right .card{
		margin: auto
	}
	.logo {
    margin: auto;
    font-size: 8rem;
    background: white;
    padding: .5em 0.8em;
    border-radius: 50% 50%;
    color: #000000b3;
}
</style>

<body>


<main id="main" class=" alert-info">
	<div id="login-left">
		<div class="logo">
			<i class="fa fa-share-alt"></i>
		</div>
	</div>
	<div id="login-right">
		<div class="card col-md-8">
			<div class="card-body">
				<form id="login-form" action="log-user.php">
					<div class="form-group">
						<label for="username" class="control-label">Email Address</label>
						<input type="text" id="username" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="password" class="control-label">Password</label>
						<input type="password" id="password" name="password" class="form-control">
					</div>
					<center><button type="submit" class="btn-sm btn-block btn-wave col-md-4 btn-primary">Login</button></center>
				</form>
			</div>
		</div>
	</div>


</main>

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


</body>

</html>