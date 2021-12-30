<?php 
session_start();
if(isset($_SESSION['user'])) {
    header('location:home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, noble ui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web, nobleuihtml">

	<title>NobleUI - HTML Bootstrap 5 Admin Dashboard Template</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com/">
  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&amp;display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="assets/vendors/core/core.css">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="assets/fonts/feather-font/css/iconfont.css">
	<link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="assets/css/demo2/style.min.css">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<body>
	<div class="main-wrapper">
		<div class="page-wrapper full-page">
			<div class="page-content d-flex align-items-center justify-content-center">

				<div class="row w-100 mx-0 auth-page">
					<div class="col-md-8 col-xl-6 mx-auto">
						<div class="card">
							<div class="row">
                <div class="col-md-4 pe-md-0">
                  <div class="auth-side-wrapper">

                  </div>
                </div>
                <div class="col-md-8 ps-md-0">
                  <div class="auth-form-wrapper px-4 py-5">
                    <a href="#" class="noble-ui-logo logo-light d-block mb-2">Noble<span>UI</span></a>
                    <h5 class="text-muted fw-normal mb-4">Welcome back! Log in to your account.</h5>
                    <form class="forms-sample" action="#" method="post" id="login-form">
                      <div id="loginAlert"></div>
                      <div class="mb-3">
                        <label for="userEmail" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                      </div>
                      <div class="mb-3">
                        <label for="userPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" autocomplete="current-password" placeholder="Password">
                      </div>
                      <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="customCheck" name="rem" <?php if(isset($_COOKIE['password'])) { ?> checked <?php } ?>>
                        <label class="form-check-label" for="customCheck">
                          Remember me
                        </label>
                      </div>
                      <div>
                        <input class="btn btn-primary me-2 mb-2 mb-md-0 text-white" type="submit" id="login-btn" value="Sign In"></input>
                        <button  class="btn btn-outline-primary btn-icon-text mb-2 mb-md-0">
                          <i class="btn-icon-prepend" data-feather="twitter"></i>
                          Login with twitter
                        </button>
                      </div>
                      <a href="register.php" class="d-block mt-3 text-muted">Not a user? Sign up</a>
                    </form>
                  </div>
                </div>
              </div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- core:js -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
	<script src="assets/vendors/core/core.js"></script>
 
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="assets/vendors/feather-icons/feather.min.js"></script>
	<script src="assets/js/template.js"></script>
	<!-- endinject -->
  <script>
    $("#login-btn").click(function(e) {
        if($("#login-form")[0].checkValidity()) {
            e.preventDefault();
            $("#login-btn").val('Please Wait...........');
            $.ajax({
                url: 'php/action.php',
                method: 'post',
                data: $("#login-form").serialize()+'&action=login',
                success:function(response) {
                    // console.log(response);
                    $("#login-btn").val('Sign In');
                    if(response === 'login') {
                        window.location = 'home.php';
                    } else {
                        $("#loginAlert").html(response);
                        }
                    }
                });
        }
        
    });
</script>

	<!-- Custom js for this page -->
	<!-- End custom js for this page -->

</body>
</html>