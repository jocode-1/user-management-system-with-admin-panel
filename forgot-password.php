<!doctype html>
<html lang="en">


<!-- Mirrored from demo.dashboardpack.com/kero-html-sidebar-pro/pages-forgot-password-boxed.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Nov 2021 05:03:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Forgot Password Boxed - Kero HTML Bootstrap 4 Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"
    />
    <meta name="description" content="Kero HTML Bootstrap 4 Dashboard Template">

    <!-- Disable tap highlight on IE -->
    <meta name="msapplication-tap-highlight" content="no">

<link href="main.css" rel="stylesheet"></head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100 bg-plum-plate bg-animation">
                    <div class="d-flex h-100 justify-content-center align-items-center">
                        <div class="mx-auto app-login-box col-md-6">
                            <div class="app-logo-inverse mx-auto mb-3"></div>
                            <div class="modal-dialog w-100">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="h5 modal-title">Forgot your Password?<h6 class="mt-1 mb-0 opacity-8"><span>Use the form below to recover it.</span></h6></div>
                                    </div>
                                    <div class="modal-body">
                                        <div>
                                            <form action="#" method= "post" id= "forgot-form">
                                                <div id="forgotAlert"></div>
                                                <div class="form-row">
                                                    <div class="col-md-12">
                                                        <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label><input name="email" id="femail" placeholder="Email here..." type="email" class="form-control"></div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="divider"></div>
                                        <h6 class="mb-0"><a href="index.php" class="text-primary">Sign in existing account</a></h6></div>
                                    <div class="modal-footer clearfix">
                                        <div class="float-right">
                                            <input type = "submit" class="btn btn-primary btn-lg" value="Reset Password" id="forgot-btn"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-white opacity-8 mt-3">Copyright © KeroUI 2019</div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <script src="assets/scripts/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/scripts/main.07a59de7b920cd76b874.js"></script></body>
<script>
        $("#forgot-btn").click(function(e) {
            if($("#forgot-form")[0].checkValidity()) {
                e.preventDefault();
                $("#forgot-btn").val('Please Wait.......');
                $.ajax({
                    url: 'php/action.php',
                    method: 'post',
                    data: $("#forgot-form").serialize()+'&action=forgot',
                    success:function(response) {
                        // console.log(response);
                        $("#forgot-btn").val('Reset Password');
                        $("#forgot-form")[0].reset();
                        $("#forgotAlert").html(response);
                    }
                });
            }
            
        });
    </script>
</html>
