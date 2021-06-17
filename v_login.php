<?php 
session_start();
include_once('c_login.php');
$database = new database();
 
if(isset($_SESSION['is_login']))
{
    header('location:Beranda/v_index.php');
}
    
if(isset($_COOKIE['username']))
{
  $database->relogin($_COOKIE['username']);
  header('location:Beranda/v_index.php');
}
 
if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(isset($_POST['remember']))
    {
      $remember = TRUE;
    }
    else
    {
      $remember = FALSE;
    }
 
    if($database->login($username,$password,$remember))
    {
      header('location:Beranda/v_index.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login BerkahTani</title>

    <!-- Favicons -->
    <link href="assets/img/BerkahTani.png" rel="icon">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="v_register.php" class="signup-image-link">Buat Akun</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="username"><i class="zmdi zmdi-account-box zmdi-hc-lg"></i></label>
                                <input type="text" name="username" id="username" placeholder="Username Anda" required/>
                            </div>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock zmdi-hc-lg"></i></label>
                                <input type="password" name="password" id="password" placeholder="Password Anda" required/>
                            </div>
                            <!-- <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="tampil" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Tampilkan Password</label>
                            </div> -->
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Login"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Login melalui</span>
                            <ul class="socials">
                                <li><a href="https://www.facebook.com/"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="https://twitter.com/?lang=id"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="https://www.google.com/account/about/"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <!-- This templates was made by Colorlib (https://colorlib.com) -->
    <!-- <script type="text/javascript"> 
            $(document).ready(function(){
                $('.tampil').click(function(){
                    if($(this).is(':checked')){
                        $('#password').attr('type','text');
                    }
                    else{
                        $('#password').attr('type','password');
                    }        
                });
            });
    </script> -->
</body>
</html>