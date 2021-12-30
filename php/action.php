<?php 

session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// require 'vendor/PHPMailer/PHPMailer/src/Exception.php';
// require 'vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
// require 'vendor/PHPMailer/PHPMailer/src/SMTP.php';

require 'vendor/autoload.php';

$mail = new PHPMailer(true);
require_once 'auth.php';
$user = new Auth();

// HANDLE REGISTER AJAX REQUEST
if (isset($_POST['action']) && $_POST['action'] == 'register' ) {
    // print_r($_POST); 
    $name = $user->test_input($_POST['name']);
    $email = $user->test_input($_POST['email']);
    $pass = $user->test_input($_POST['password']);

    $hpass = password_hash($pass, PASSWORD_DEFAULT);
    
    if($user->user_exist($email)) {
        echo $user->showMessage('danger', 'This E-mail is already registerd!');
    } else {
        if($user->register($name, $email, $hpass)) {
            echo 'register';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'Something went wrong! try again later!');
        }
    }
}

// HANDLE LOGIN AJAX REQUEST

if (isset($_POST['action']) && $_POST['action'] == 'login' ) {
    $email = $user->test_input($_POST['email']);
    $pass = $user->test_input($_POST['password']);

    $loggedInUser = $user->login($email);
    if($loggedInUser != null) {
        if(password_verify($pass, $loggedInUser['password'])) {
            if(!empty($_POST['rem'])) {
                setcookie("email", $email, time()+(30*24*60*60), '/');
                setcookie("password", $pass, time()+(30*24*60*60), '/');
            } else {
                setcookie("email", "",1, '/');
                setcookie("password", "",1, '/');
            }
            echo 'login';
            $_SESSION['user'] = $email;
        } else {
            echo $user->showMessage('danger', 'Password is Incorrect!!!!');
        }
    } else {
        echo $user->showMessage('danger', 'User Not Found Please Register!');
    }
}

// HANDLE FORGET PASSWORD AJAX REQUEST

if (isset($_POST['action']) && $_POST['action'] == 'forgot' ) { 
    // print_r($_POST);     
    $email = $user->test_input($_POST['email']);
    $user_found = $user->currentUser($email);

    if($user_found != null ) {
        $token = uniqid();
        $token = str_shuffle($token);

        $user->forgot_password($token, $email);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username   = Database::USERNAME;                   //SMTP username   
            $mail->Password   = Database::PASSWORD;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            $mail->setFrom(Database::USERNAME,'Jocode');
            $mail->addAddress($email);     

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Reset Password';
            $mail->Body    = '<h3>Click the below link to Reset Your Password.<br>
            <a href="http://localhost/admins/reset-pass.php?email='.$email.'
            &token='.$token.'">http://localhost/admins/reset-pass.php?email='
            .$email.' &token='.$token.'</a><br>Regards<br>Jocode Ventures</h3>';
            
            $mail->send();
            echo $user->showMessage('success', 'we have sent you a reset link to '.$email.' Please check your email');
            

        } catch (Exception $e) {
            // echo $user->showMessage('danger', 'something went wrong! Please try again later.');
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }

    } 
    else {
        echo $user->showMessage('info', 'This email is not registered');
    }

}

// checking user is logged in 

if (isset($_POST['action']) && $_POST['action'] == 'checkUser' ) { 

    if(!$user->currentUser($_SESSION['user'])) {
        echo 'bye';
        unset($_SESSION['user']);
    }
}


?>