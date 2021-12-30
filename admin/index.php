<?php 
session_start();
if(isset($_SESSION['username'])) {
    header('location:admin-dashboard.php');
    exit();
}
include_once 'php/config.php';

$ob = new Database();
 $sql = "UPDATE visitors SET hits = hits + 1 WHERE id = 0";
 $stmt = $ob->conn->prepare($sql);
 $stmt->execute();

?>

<!DOCTYPE html>
<html lang="en">


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Dashboard Template</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Admin Login</h4>
              </div>
              <div class="card-body">
                <form method="post" action="" id="admin-login-form" class="needs-validation" novalidate="">
                  <div id="adminLoginAlert"></div>
                  <div class="form-group">
                    <label for="email">Username</label>
                    <input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your Username
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                      <!-- <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Forgot Password?
                        </a>
                      </div> -->
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Remember Me</label>
                    </div>
                  </div> -->
                  <div class="form-group">
                    <button type="submit" id="adminLoginBtn" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                </form>
                
              </div>
            </div>
    
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="assets/js/jquery-3.5.1.min.js"></script>
  <script src="assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="assets/js/custom.js"></script>

<script>
  $(document).ready(function(){
    $("#adminLoginBtn").click(function(e){
      if($("#admin-login-form")[0].checkValidity()){
        e.preventDefault();
        $(this).val('Please Wait....');
        // console.log(1);
        $.ajax({
          url: 'php/admin_action.php',
          method: 'post',
          data: $("#admin-login-form").serialize()+'&action=adminLogin',
          success:function(response) {
            // console.log(response);
            if(response === 'admin_login') {
              window.location ='admin-dashboard.php';
            } else {
              $("#adminLoginAlert").html(response);
            }
          }
        });
      }

    });

  });



</script>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>