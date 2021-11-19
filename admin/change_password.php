<!doctype html>
<html class="no-js" lang="">
<?php
session_start();


?>


<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login Register | Notika - Notika Admin Template</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- favicon
		============================================ -->
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Google Fonts
		============================================ -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
  <!-- Bootstrap CSS
		============================================ -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- font awesome CSS
		============================================ -->
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <!-- owl.carousel CSS
		============================================ -->
  <link rel="stylesheet" href="css/owl.carousel.css">
  <link rel="stylesheet" href="css/owl.theme.css">
  <link rel="stylesheet" href="css/owl.transitions.css">
  <!-- animate CSS
		============================================ -->
  <link rel="stylesheet" href="css/animate.css">
  <!-- normalize CSS
		============================================ -->
  <link rel="stylesheet" href="css/normalize.css">
  <!-- mCustomScrollbar CSS
		============================================ -->
  <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
  <!-- wave CSS
		============================================ -->
  <link rel="stylesheet" href="css/wave/waves.min.css">
  <!-- Notika icon CSS
		============================================ -->
  <link rel="stylesheet" href="css/notika-custom-icon.css">
  <!-- main CSS
		============================================ -->
  <link rel="stylesheet" href="css/main.css">
  <!-- style CSS
		============================================ -->
  <link rel="stylesheet" href="style.css">
  <!-- responsive CSS
		============================================ -->
  <link rel="stylesheet" href="css/responsive.css">
  <!-- modernizr JS
		============================================ -->
  <script src="js/vendor/modernizr-2.8.3.min.js"></script>
  <!-- modernizr JS
		============================================ -->
  <script src="js/sweetalert.min.js"></script>

  <style>
    .btn-action {
      opacity: .8;
      transition: all .4s ease;
      border: none;
      outline: none;
      box-shadow: none;
    }

    .btn-action:hover,
    .btn-action:focus {
      opacity: 1;
      color: #fff;
      border: none;
      outline: none;
      box-shadow: none;
    }
  </style>
</head>

<body>
  <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
  <!-- Login Register area Start-->
  <div class="login-content">
    <!-- Forgot Password -->
    <div class="nk-block toggled" >
      <form method="POST" action="./handlers/forgot_password.php" class="nk-form">
        <div class="input-group">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
          <div class="nk-int-st">
            <input required type="text" id="pass1" name="password" class="form-control" placeholder="New Password">
          </div>
        </div>

        <div class="input-group">
          <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
          <div class="nk-int-st">
            <input required type="text" id="pass2" class="form-control" placeholder="Confirm Password">
          </div>
        </div>

        <button type="submit" name="change" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow"></i></button>
      </form>

        <div class="nk-navigation nk-lg-ic rg-ic-stl">
            <a href="./index.php"><i class="notika-icon notika-right-arrow"></i> <span>Sign in</span></a>
            <a href="./index.php"><i class="notika-icon notika-plus-symbol"></i> <span>Register</span></a>
        </div>
    </div>
  </div>
  <!-- Login Register area End-->
  <!-- jquery
		============================================ -->
  <script src="js/vendor/jquery-1.12.4.min.js"></script>
  <!-- bootstrap JS
		============================================ -->
  <script src="js/bootstrap.min.js"></script>
  <!-- wow JS
		============================================ -->
  <script src="js/wow.min.js"></script>
  <!-- price-slider JS
		============================================ -->
  <script src="js/jquery-price-slider.js"></script>
  <!-- owl.carousel JS
		============================================ -->
  <script src="js/owl.carousel.min.js"></script>
  <!-- scrollUp JS
		============================================ -->
  <script src="js/jquery.scrollUp.min.js"></script>
  <!-- meanmenu JS
		============================================ -->
  <script src="js/meanmenu/jquery.meanmenu.js"></script>
  <!-- counterup JS
		============================================ -->
  <script src="js/counterup/jquery.counterup.min.js"></script>
  <script src="js/counterup/waypoints.min.js"></script>
  <script src="js/counterup/counterup-active.js"></script>
  <!-- mCustomScrollbar JS
		============================================ -->
  <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <!-- sparkline JS
		============================================ -->
  <script src="js/sparkline/jquery.sparkline.min.js"></script>
  <script src="js/sparkline/sparkline-active.js"></script>
  <!-- flot JS
		============================================ -->
  <script src="js/flot/jquery.flot.js"></script>
  <script src="js/flot/jquery.flot.resize.js"></script>
  <script src="js/flot/flot-active.js"></script>
  <!-- knob JS
		============================================ -->
  <script src="js/knob/jquery.knob.js"></script>
  <script src="js/knob/jquery.appear.js"></script>
  <script src="js/knob/knob-active.js"></script>
  <!--  Chat JS
		============================================ -->
  <script src="js/chat/jquery.chat.js"></script>
  <!--  wave JS
		============================================ -->
  <script src="js/wave/waves.min.js"></script>
  <script src="js/wave/wave-active.js"></script>
  <!-- icheck JS
		============================================ -->
  <script src="js/icheck/icheck.min.js"></script>
  <script src="js/icheck/icheck-active.js"></script>
  <!--  todo JS
		============================================ -->
  <script src="js/todo/jquery.todo.js"></script>
  <!-- Login JS
		============================================ -->
  <script src="js/login/login-action.js"></script>
  <!-- plugins JS
		============================================ -->
  <script src="js/plugins.js"></script>
  <!-- main JS
		============================================ -->
  <script src="js/main.js"></script>
  <!-- Login JS
		============================================ -->
  <script type="module" src="js/apis/login.js"></script>
  <!-- Register JS
		============================================ -->
  <script type="module" src="js/apis/register.js"></script>

  <script>
    const passwordOne = document.querySelector("#pass1")
    const passwordTwo = document.querySelector("#pass2")

    passwordTwo.addEventListener("blur", () => {
        if((passwordOne.value ).trim() !== (passwordTwo.value).trim()){
            passwordTwo.style.borderColor = "red"
        }
        else{
            passwordTwo.style.borderColor = "#EBEBEB"
        }
    })
    </script>
</body>

</html>