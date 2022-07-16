<?php include("includes/connection.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login - Glowedu</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
</head>

<body>
  <?php
  if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['user_email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['user_password']);
    //Error Handlers
    //Check if inputs are empty
    if (empty($email) || empty($pwd)) {
      echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Username and Password are Empty!</p>";
    } else {
      $sql = "SELECT * FROM user_data WHERE email='$email'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if ($resultCheck < 1) {
        echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail is Incorrect!</p>";
      } else {
        if ($row = mysqli_fetch_assoc($result)) {
          $id_login = $row['id'];
          $email_login = $row['email'];
          $password_login = $row['password'];
          //dehashing the password        
          $hashedPwdCheck = password_verify($pwd, $row['password']);
          if ($hashedPwdCheck == false) {
            echo "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password is Incorrect!!</p>";
          } elseif ($hashedPwdCheck == true) {
            $session_token = md5(time() . $email_login);
            $_SESSION['id'] = $id_login;
            $_SESSION['email'] = $email_login;
            $_SESSION['password'] = $password_login;
            echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
            exit();
          }
        }
      }
    }
  }

  ?>
  <?php
  $status = @$_GET['status'];
  if ($status == "1") {
    $status = "<p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #1266f1;'>Your Account Has Been Created!</p>";
  } else {
    $status = "";
  }
  if (isset($_SESSION['user_email'])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=index.php\">";
    exit();
  } else {
  }
  echo $status;
  ?>

  <section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Log In</p>

                  <form class="mx-1 mx-md-4" method="POST" action="login.php">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example3c" name="user_email" class="form-control" />
                        <label class="form-label" for="form3Example3c">Your Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4c" name="user_password" class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center">
                      <input type="submit" value="Submit" name="submit" class="btn btn-primary"></button>
                      <a style="margin-left: 15px; margin-top: 5px;" href="./registration.php">Sign Up!</a>
                    </div>

                  </form>

                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                  <img src="assets/images/undraw_online_learning_re_qw08.svg" style="width: 100%; height: 20em;" class="img-fluid" alt="Sample image">

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>

</html>