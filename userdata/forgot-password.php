<!DOCTYPE html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password? - GlowEDU</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <?php
    if (isset($_SESSION['username'])) {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
        exit();
    } else {
    }
    ?>
    <?php
    $submit = @$_POST['check'];
    $email = strip_tags(@$_POST['email']);
    if ($submit) {
    }
    ?>
</head>

<body>
    <div class="one" style="margin-top: 8%;">
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form"><br><br><br><br>
                        <h2 class="form-title">Forgot Password?</h2>
                        <form method="POST" action='forgot-password.php' class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" />
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="check" id="signup" class="form-submit" value="Send Link" />
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/forgot.svg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Back To Login!</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <br>
    <center>
        <p style="font-size: 13.5px; color: #555;">&copy; 2021 Learn GlowEDU</p>
    </center>
    <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>