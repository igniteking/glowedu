<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
  <head>
    <?php
  if (isset($_SESSION['email'])) {
} else {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
    exit();
}
?>
    <?php
        $query = "SELECT * from users WHERE email = '".$_SESSION['email'] ."'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];
        $ut = $rows['user_type'];
        $user = $rows['username'];
        }
    ?>
  	<title>Users - GlowEdu</title>
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
      <img src="images/main.png" width ="40px">
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
<div class="row mt-12">
      <h2 class="col-md-4" id="subhead">User Data!</h2>
      <?php
        if ($ut == 'superadmin') {
      echo '<div class="col-md-8"><a href="admin-create.php"><button type="button" onclick="showAlert()" class="btn btn-outline-primary float-right"><i class="fa fa-plus" aria-hidden="true"></i> Create Admin</button></a></div>';
        }else {}
      ?>
      <?php
        $query = "SELECT * from users";
        $result = mysqli_query($conn, $query);
        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];
        $username = $rows['username'];
        $email = $rows['email'];
        $mobile = $rows['mobile'];
    	  $date = $rows['date'];
        $state = $rows['state'];
        $user_type = $rows['user_type'];
        $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE id=$id");
        $get_pic_row = mysqli_fetch_assoc($check_pic);
        $profile_pic_db = $get_pic_row['profile_pic'];
    	  $active = $rows['active'];
        if($active == 1) {
          $active = "Active";
        if ($profile_pic_db == "") {
          $profile_pic2 = "";
          $active = "Active";
          echo "<div class='row' style='border-radius: 4px; border: 1px solid #eee; width: 100%; height: 15%; background: #f1f1f1; margin-bottom: 30px;'>
          <div class='col-sm' style='padding: 20px;'><img src='images/user.png' width='60px;' height='60px' style='float: right;'></img>
          <a href='user.php?id=$id'><div class='col-sm'><div style='background: #666; padding-top: 8px; margin-right: 10px; padding-bottom: 8px; padding-left: 10px; padding-right: 10px; float: left;'>
          ID#$username</a></div></div> E-mail : $email || Profile : $active || User Type: $user_type <div class='col-sm' style='font-size: 13.5px; color: #666;'>Contact-Number : $mobile || Assigned On : $date<a href='delete.php?id=$id'><button style='margin-left: 70px;' type='button' class='btn btn-outline-danger'>Delete</button></a></div></div></div>";
          }
              else{
              $active = "Active";
              $profile_pic2 = "userdata/".$profile_pic_db;     
              echo "<div class='row' style='border-radius: 4px; border: 1px solid #eee; width: 100%; height: 15%; background: #f1f1f1; margin-bottom: 30px;'>
              <div class='col-sm' style='padding: 20px;'><img src='$profile_pic2' width='60px;' height='60px' style='float: right;'></img>
              <a href='user.php?id=$id'><div class='col-sm'><div style='background: #666; padding-top: 8px; margin-right: 10px; padding-bottom: 8px; padding-left: 10px; padding-right: 10px; float: left;'>
              ID#$username</a></div></div> E-mail : $email || Profile : $active ||  User Type: $user_type <div class='col-sm' style='font-size: 13.5px; color: #666;'>Contact-Number : $mobile || Assigned On : $date<a href='delete.php?id=$id'><button style='margin-left: 70px;' type='button' class='btn btn-outline-danger'>Delete</button></a></div></div></div>";
          }
        	
        } else {
          if ($profile_pic_db == "") {
            $profile_pic2 = "";
            $active = "Not Active";
            echo "<div class='row' style='border-radius: 4px; border: 1px solid #eee; width: 100%; height: 15%; background: #f1f1f1; margin-bottom: 30px;'>
            <div class='col-sm' style='padding: 20px;'><img src='images/user.png' width='60px;' height='60px' style='float: right;'></img>
            <a href='user.php?id=$id'><div class='col-sm'><div style='background: #666; padding-top: 8px; margin-right: 10px; padding-bottom: 8px; padding-left: 10px; padding-right: 10px; float: left;'>
            ID#$username</a></div></div> E-mail : $email || Profile : $active || User Type: $user_type <div class='col-sm' style='font-size: 13.5px; color: #666;'>Contact-Number : $mobile || Assigned On : $date<a href='delete.php?id=$id'><button style='margin-left: 70px;' type='button' class='btn btn-outline-danger'>Delete</button></a></div></div></div>";
            }
                else{
                $profile_pic2 = "userdata/".$profile_pic_db;   
                $active = "Not Active";
                echo "<div class='row' style='border-radius: 4px; border: 1px solid #eee; width: 100%; height: 15%; background: #f1f1f1; margin-bottom: 30px;'>
                <div class='col-sm' style='padding: 20px;'><img src='$profile_pic2' width='60px;' height='60px' style='float: right;'></img>
                <a href='user.php?id=$id'><div class='col-sm'><div style='background: #666; padding-top: 8px; margin-right: 10px; padding-bottom: 8px; padding-left: 10px; padding-right: 10px; float: left;'>
                ID#$username</a></div></div> E-mail : $email || Profile : $active ||  User Type: $user_type <div class='col-sm' style='font-size: 13.5px; color: #666;'>Contact-Number : $mobile || Assigned On : $date<a href='delete.php?id=$id'><button style='margin-left: 70px;' type='button' class='btn btn-outline-danger'>Delete</button></a></div></div></div>";
            }
        }}
        ?>
      </div>
		</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>