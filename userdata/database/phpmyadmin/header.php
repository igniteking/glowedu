<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<html lang="en">
<?php
if (isset($_SESSION['email'])) {

  $query = "SELECT * from users WHERE email = '$email'";
  $result = mysqli_query($conn, $query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $user_id = $rows['id'];
    $user = $rows['username'];
    $em = $rows['email'];
    $ut = $rows['user_type'];
    $active = $rows['active'];
  }
} else {
}

$start_time = 0;
$end_time = 0;
$query2 = "SELECT * from calculate";
$result2 = mysqli_query($conn, $query2);
while ($rows = mysqli_fetch_assoc($result2)) {
  $start_time += $rows['start_time'];
  $end_time += $rows['end_time'];
}
$severtime = $end_time - $start_time;
?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../../css/css/style.css">
</head>

<body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar">
      <div class="p-4 pt-5">
        <?php

        ?>

        <?php
        if (!isset($_SESSION['email'])) {
        } else {
          $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE email = '$email'");
          $get_pic_row = mysqli_fetch_assoc($check_pic);
          $profile_pic_db = $get_pic_row['profile_pic'];
          if ($profile_pic_db == "") {
            $profile_pic = "<center><img class='rounded-circle mt-5' width='150px' height='150px;' src='images/user.png'></center><br>";
            echo $profile_pic;
          } else {
            $profile_pic2 = "userdata/" . $profile_pic_db;
            echo "<center><img class='rounded-circle mt-5' width='150px' height='150px;' src='$profile_pic2'></center><br>";
          }
          echo '<center><h4 style="color: white;"><a href="profile.php">' . $user . '</a></h4><br></center>';
        }
        ?>


        <?php
        if (!isset($_SESSION['email'])) {
          echo '
              <ul class="list-unstyled components mb-5">
              <li class="active">
                <a href="login.php" aria-expanded="false">Login</a></li>
              <li>
                <a href="about.php">About Us</a>
              </li>
              <li>
                <a href="contact.php">Contact</a>
              </li>
              <li>
                <a href="tandc.php">Terms and Conditions</a>
              </li>
            </ul>';
        } else {
          if ($ut == 'student') {
            echo "
              <ul class='list-unstyled components mb-5'>
              <li class='active'>
                <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'><i class='fa fa-home' aria-hidden='true'></i> Home</a>
                <ul class='collapse list-unstyled' id='homeSubmenu'>
                <li>
                 <a href='index.php'>Home</a>
                  </li>
                  <li>
                      <a href='about.php'>About Us</a>
                  </li>
                  <li>
                      <a href='contact.php'>Contact Us</a>
                  </li>
                </ul>
              </li>";
            if ($active == 1) {
              $active = "Active";
              echo "<li>
                  <a href='progress.php'><i class='fa fa-tasks' aria-hidden='true'></i> Progress</a>
                </li>";
              $dialog = "";
            } else {
            }
        ?>
        <?php
            echo " <li>
                <a href='#pageSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'><i class='fa fa-language' aria-hidden='true'></i> Courses</a>
                <ul class='collapse list-unstyled' id='pageSubmenu'>
                  <li>
                      <a href='python_module.php'>Python</a>
                  </li>
                  
                </ul>
              </li>
              <li>
                <a href='profile.php'><i class='fa fa-user' aria-hidden='true'></i> Profile</a>
              </li>
            </ul>";
          } else {}
          if ($ut == 'superadmin') {
            echo "
              <ul class='list-unstyled components mb-5'>
              <li class='active'>
                <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'><i class='fa fa-home' aria-hidden='true'></i> Home</a>
                <ul class='collapse list-unstyled' id='homeSubmenu'>
                <li>
                      <a href='index.php'>Home</a>
                  </li>
                  <li>
                      <a href='about.php'>About Us</a>
                  </li>
                  <li>
                      <a href='contact.php'>Contact Us</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href='#pageSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'><i class='fa fa-language' aria-hidden='true'></i> Courses</a>
                <ul class='collapse list-unstyled' id='pageSubmenu'>
                  <li>
                      <a href='python_module.php'>Python</a>
                  </li>
                </ul>
              </li>
              <li>
                  <a href='user.php'><i class='fa fa-database' aria-hidden='true'></i> User Data</a>
              </li>
              <li>
                  <a href='upload.php'><i class='fa fa-graduation-cap' aria-hidden='true'></i> Upload Study Material</a>
              </li>
              <li>
                <a href='profile.php'><i class='fa fa-user' aria-hidden='true'></i> Profile</a>
              </li>
            </ul>";
          } else {}
          if ($ut == 'admin') {
            echo "
              <ul class='list-unstyled components mb-5'>
              <li class='active'>
                <a href='#homeSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'><i class='fa fa-home' aria-hidden='true'></i> Home</a>
                <ul class='collapse list-unstyled' id='homeSubmenu'>
                <li>
                      <a href='index.php'>Home</a>
                  </li>
                  <li>
                      <a href='about.php'>About Us</a>
                  </li>
                  <li>
                      <a href='contact.php'>Contact Us</a>
                  </li>
                </ul>
              </li>
              <li>
                <a href='#pageSubmenu' data-toggle='collapse' aria-expanded='false' class='dropdown-toggle'><i class='fa fa-language' aria-hidden='true'></i> Courses</a>
                <ul class='collapse list-unstyled' id='pageSubmenu'>
                  <li>
                      <a href='python_module.php'>Python</a>
                  </li>
                </ul>
              </li>
              <li>
                  <a href='upload.php'><i class='fa fa-graduation-cap' aria-hidden='true'></i> Upload Study Material</a>
              </li>
              <li>
                <a href='profile.php'><i class='fa fa-user' aria-hidden='true'></i> Profile</a>
              </li>
            </ul>";
          }

        }
        ?>
        <div class="footer">
          <?php
          if (!isset($_SESSION['email'])) {
          } else {

            echo '<a href="logout.php"><button style="width: 100%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;"><i class="fas fa-sign-out-alt"></i> Logout</button></a>';
          }
          ?>
        </div>
    </nav>

    <!-- Page Content  -->


    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/main.js"></script>
</body>

</html>