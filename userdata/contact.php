<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">

<head>
  <title>Contact - GlowEdu</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/css/style.css">
</head>

<body>
  <div id="content" class="p-4 p-md-5">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">

        <button type="button" id="sidebarCollapse" class="btn btn-primary">
          <i class="fa fa-bars"></i>
          <span class="sr-only">Toggle Menu</span>
        </button>
        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
              <img src="images/main.png" width="50px">
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="box">

      <div class="text">
        <h1 style="color: #fff;">Contact <span class="red">Us</span></h1>
        <hr class="redline">
        <p>Have Questions ? We have answers ( may be )</p>
      </div>
    </div>
    <div id="wrapper">
      <div id='responsive_div'>
        <div style='padding: 0px 40px;'>
          <br><br>
          <center>
          <h3>Our Address</h3>
          <div class="redline-address"></div>
          <Navrangpura,> <b>Address : </b>Shree complex Hostel Road opposite AES sports complex University boys, Navrangpura, Ahmedabad, Gujarat 380009</p>
            <div class="phone-e">
              <p><span class="glyphicon glyphicon-envelope"> </span> <b>E-mail :</b> info@glowedu.co.in</p>
              <p><span class="glyphicon glyphicon-phone"></span><b>Contact Number :</b> +91 98250 85454</p>
            </div>
            <div class="d-flex flex-row justify-content p-1">
              <!--map-->
              <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Shree%20complex%20Hostel%20Road%20opposite%20AES%20sports%20complex%20University%20boys,%20Navrangpura,%20Ahmedabad,%20Gujarat%20380009+(My%20Business%20Name)&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe></div>            </div>
        </div>
      </div></center>
      <div id='responsive_div'>
        <div style='padding: 0px 40px;'>
          <br><br>
          <h3>Get In Touch</h3>
          <div class="redline-address"></div>
          <?php
          $send = @$_POST['send'];
          $name = strip_tags(@$_POST['name']);
          $email = strip_tags(@$_POST['email']);
          $mobile = strip_tags(@$_POST['mobile']);
          $message = strip_tags(@$_POST['message']);
          $contact_email = "learn.glowedu@gmail.com";
          if ($send) {
            if ($name && $email && $mobile && $message) {
              require 'class/class.phpmailer.php';
              $mail = new PHPMailer();
              $mail->isSMTP();
              $mail->SMTPAuth = true;
              $mail->SMTPSecure = 'tls';
              $mail->Host = 'smtp.gmail.com';
              $mail->Port = '587';
              $mail->isHTML();
              $mail->Username = 'learn.glowedu@gmail.com';
              $mail->Password = 'Website@123';
              $mail->SetFrom('learn.glowedu@gmail.com');
              $mail->Subject = "Contact Us - Query";
              $mail->Body = "Name : $name<br> Email : $email <br> Mobile : $mobile <br> Message : $message";
              $mail->AddAddress($contact_email);
              $mail->Send();
              echo "<p style='color: #fff; padding: 10px; background: #69a550; border-radius: 8px;'>Query Has Been Sent!</p>";
            } else {
              echo "<p style='color: #fff; padding: 10px; background: #fd6b6b; border-radius: 8px;'>Please Fill All The Missing Fields!</p>";
            }
          }
          ?>
          <form action="contact.php" method='POST'>
            <input type="text" name="name" placeholder="Your Name" value="" style='font-family: poppins; border: 2px solid #eee; width: 100%; padding: 10px; margin-bottom: 20px;' />
            <input type="email" name="email" placeholder="Email" value="" style='font-family: poppins; border: 2px solid #eee; width: 100%; padding: 10px; margin-bottom: 20px;' />
            <input type="tel" name="mobile" placeholder="Mobile" value="" style='font-family: poppins; border: 2px solid #eee; width: 100%; padding: 10px; margin-bottom: 20px;' />
            <textarea name="message" placeholder="Ask Something..." style='font-family: poppins; border: 2px solid #eee; width: 100%; padding: 10px; margin-bottom: 20px; resize: none; height: 120px;'></textarea>
            <input type="Submit" name="send" value="Ask A Question" style='font-family: Poppins; padding: 10px; color: #888; font-size: 14px; border: 2px solid #eee; background: #eee;'>
          </form>
        </div>
      </div>
      <div style="clear: both"></div>

      <style>
        #responsive_div {
          float: left;
          width: 50%;
        }

        body {
          margin: 0;
        }

        .box {
          background: url("https://image.ibb.co/nJHGgk/about_us1.jpg");
          color: white;
          text-align: center;
          z-index: 1;
          border-radius: 8px;
        }

        .text {
          padding: 100px 0;
        }

        .box p {
          font-size: 18px;
        }

        .red {
          color: orangered;
        }

        .redline {
          width: 100px;
          height: 3px;
          background-color: red;
          border: none;
        }

        .touch h2 {
          padding-top: 20px;
          text-align: center;
        }

        .form-margin {
          margin-top: 40px;
        }

        .left {
          text-align: left;
        }

        h3 {
          font-variant: bold;
        }

        .redline-address {
          border: none;
          height: 3px;
          background-color: orangered;
          width: 140px;
          margin-bottom: 20px;
        }

        .address {
          padding-top: 50px;
        }

        .address p {
          font-weight: bold;
          color: #676565;
          margin: 3px;
        }

        .phone-e {
          padding: 15px 0;
        }

        .logo img {
          height: 100px;
          width: 100px;
          z-index: 2;
          float: left;
          margin-top: 10px;
        }

        .bottom-gap {
          margin-bottom: 100px;
        }

        /*validation css*/
        input.ng-valid {
          background-color: #dff0d8;
        }

        input.ng-invalid {
          background-color: #f2dede;
        }

        input.ng-pristine {
          background-color: white;
        }

        textarea.ng-invalid {
          background-color: #f2dede;
        }

        textarea.ng-pristine {
          background-color: white;
        }

        textarea.ng-valid {
          background-color: #dff0d8;
        }

        @media only screen and (max-width: 768px) {
          #responsive_div {
            float: left;
            width: 100%;
          }
        }
      </style>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>