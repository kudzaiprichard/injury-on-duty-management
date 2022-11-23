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
        <div class="col-md-6">
        <?php
        
            if(isset($_SESSION["msg"])){
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert-div">
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
        
        <form action="register-user.php">
            <div class="card mb-4 mx-4">
                <div class="card-body p-4">
                <h1>Register</h1>
                <p class="text-medium-emphasis">Register your account</p>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="../../vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
                    </svg></span>
                    <input class="form-control" type="text" placeholder="Email" name="email">
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                        <use xlink:href="../../vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span>
                    <input class="form-control" type="password" placeholder="Password" name="password">
                </div>

                <div class="input-group mb-4"><span class="input-group-text">
                <svg class="icon">
                        <use xlink:href="../../vendors/@coreui/icons/svg/free.svg#cil-lock-locked"></use>
                    </svg></span>
                    <input class="form-control" type="password" placeholder="Repeat password" name="repeat_password">
                </div>

                <p>Already have an account  <a href="login.php">login</a></p>
                <button class="btn btn-block btn-success" type="submit">Create Account</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>