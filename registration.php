<?php include("./includes/connection.php");
include("./includes/functions.php"); ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration - Glowedu</title>
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
  $submit = @$_POST['submit'];
  $username = strip_tags(@$_POST['username']);
  $email = strip_tags(@$_POST['email']);
  $password = strip_tags(@$_POST['password']);
  $user_type = strip_tags(@$_POST['user_type']);
  $r_pswd = strip_tags(@$_POST['repeat-password']);
  $date = date("Y-m-d");
  $code = rand();
  if ($submit) {
    if ($username && $password && $r_pswd && $user_type) {
      $user_check2 = "SELECT email from user_data WHERE email='$email'";
      $result2 = mysqli_query($conn, $user_check2);
      $result_check2 = mysqli_num_rows($result2);
      if (!$result_check2 > 0) {
        if ($password == $r_pswd) {
          if (preg_match("/\d/", $password)) {
            if (preg_match("/[A-Z]/", $password)) {
              if (preg_match("/[a-z]/", $password)) {
                if (preg_match("/\W/", $password)) {
                  $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                  mysqli_query($conn, "INSERT INTO `user_data`(`id`, `username`, `email`, `password`, `user_type`, `created_at`)
                                           VALUES (NULL, '$username','$email','$hashedPwd', '$user_type', '$date')");
                  if ($user_type == "teacher") {
                    mysqli_query($conn, "INSERT INTO `teacher_data`(`teacher_id`, `teacher_name`, `teacher_email`, `code`, `created_at`)
                                           VALUES (NULL, '$username','$email','$code','$date')");
                    SendMail($email, 'Hi!Welcome to GlowEdu... <br> <br> This is your student registration link!<br> <br> https://learn.glowedu.co.in/glowedu/new_registration.php?user_type=teacher&code=' . $code);
                  } elseif ($user_type == "university") {
                    mysqli_query($conn, "INSERT INTO `university_data`(`university_id`, `university_name`, `university_email`, `code`, `created_at`)
                                           VALUES (NULL, '$username','$email','$code','$date')");
                    SendMail($email, 'Hi!Welcome to GlowEdu... <br> <br> This is your techer registration link!<br> <br> https://learn.glowedu.co.in/glowedu/new_registration.php?user_type=university&code=' . $code);
                  } elseif ($user_type == "recruiter") {
                    mysqli_query($conn, "INSERT INTO `recruiter_data`(`recruiter_id`, `recruiter_name`, `recruiter_email`, `created_at`)
                                           VALUES (NULL, '$username','$email','$date')");
                  } else {
                    mysqli_query($conn, "INSERT INTO `student_data`(`student_id`, `student_name`, `student_email`, `created_at`)
                                           VALUES (NULL, '$username','$email','$date')");
                  }
                  echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php?status=1\">";
                } else {
                  echo "<div class='error-styler'><center>
                                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one special character!</p>;
                                        </center></div>";
                }
              } else {
                echo "<div class='error-styler'><center>
                                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one small Letter</p>
                </center></div>";
              }
            } else {
              echo "<div class='error-styler'><center>
                                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one Capital Letter</p>
                </center></div>";
            }
          } else {
            echo "<div class='error-styler'><center>
                            <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Password should contain at least one digit</p>
            </center></div>";
          }
        } else {
          echo "<div class='error-styler'><center>
                        <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Both Password's Dont Match!</p>
            </center></div>";
        }
      } else {
        echo "<div class='error-styler'><center>
                    <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>E-mail already exist!</p>
            </center></div>";
      }
    } else {
      echo "<div class='error-styler'><center>
                <p style='padding: 10px; margin: 10px; font-size: 14px; color: #fff; font-weight: 600; border-radius: 8px; text-align: center; background: #ff7474;'>Please Fill In All Fields!</p>
            </center></div>";
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

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign Up</p>

                  <form class="mx-1 mx-md-4" method="POST" action="registration.php">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example3c" name="username" class="form-control" />
                        <label class="form-label" for="form3Example3c">Username</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example3c" name="email" class="form-control" />
                        <label class="form-label" for="form3Example3c">Email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-unlock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4c" name="password" class="form-control" />
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4c" name="repeat-password" class="form-control" />
                        <label class="form-label" for="form3Example4c">Re-Type Password</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-list fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <select name="user_type" id="" class="form-control">
                          <option value="">Select User Type</option>
                          <option value="student">Student</option>
                          <option value="teacher">Teacher</option>
                          <option value="recruiter">Recruiter</option>
                          <option value="university">University</option>
                        </select>
                      </div>
                    </div>

                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <input type="submit" value="Sign Up!" name="submit" class="btn btn-primary btn-lg"></button>
                      <a style="margin-left: 15px; margin-top: 5px;" href="./login.php">Sign In!</a>
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