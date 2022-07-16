<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/css/style.css">
    <title>Python Modules - GlowEdu</title>
    <?php
    if (isset($_SESSION['email'])) {
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
        exit();
    }
    ?>
    <?php
    if (isset($_SESSION['email'])) {
    
        $query = "SELECT * from users WHERE email = '$email'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $ut = $rows['user_type'];
        $active = $rows['active'];
        }
      } else {
        
      }
    ?>
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
        <li class="nav-item">
        <div class="input-group">
  <div class="form-outline">
    <form action="search.php" method="GET">
    <input type="search" id="form1" name="find" class="form-control" placeholder="Search" /></div>
  <button type="submit" class="btn btn-primary">Search
    <i class="fa fa-search"></i>
  </button></form>
</div>
        </li>
      </ul>
      </ul>
    </div>
  </div>
</nav>
<?php
        $query = "SELECT * from users WHERE email = '".$_SESSION['email'] ."'";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
          if($active == 1) {
            $dialog = "";
        } else {
            $active = "Verify Your Email!";
            echo "<p style='padding: 10px; font-size: 14px; color: #fff; border-radius: 8px; text-align: center; background: #ff7474;'>Go To <a href='index.php' style='color: #eee'><u>HOME</u></a> and Verify your E-mail to access the modules!</p>";
        }
      }
      ?>
<h2 class='mb-4'>Python Modules</h2>
<div class='row mt-3'>
<?php
        $query = "SELECT * from courses";
        $result = mysqli_query($conn, $query);

        while($rows = mysqli_fetch_assoc($result))
        {
        $id = $rows['id'];
        $course_topic = $rows['course_topic'];
        $course_category = $rows['course_category'];
        $course_data = $rows['course_data'];
        $youtube_link = $rows['youtube_link'];
        $hints = $rows['hints'];
        $answer = $rows['answer'];
        ?>
        <?php  if ($ut == 'student') {
          if($active == 1) {
            echo "<a href='python.php?id=$id'><div id='card' class='col-md-4' style='margin-top: 15px;'>
            <div id='flip-card'>
              <div id='flip-card-front' class='cardfrount'>$course_topic<br>$course_category</div>
              <div id='flip-card-back' style='overflow-y: scroll; padding: 20px;'>$course_data</div>
            </div></a>
          </div>";
          } else {
          echo "<div id='card' class='col-md-4' style='margin-top: 15px;'>
          <div id='flip-card'>
            <div id='flip-card-front' class='cardfrount'>$course_topic<br>$course_category</div>
            <div id='flip-card-back' style='overflow-y: scroll; padding: 20px;'>$course_data</div>
          </div>
        </div>";}}
        ?>
        <?php
        if ($ut == 'superadmin') {
        echo "
        <a href='module.php?id=$id'><div id='card' class='col-md-4' style='margin-top: 15px;'>
        <div id='flip-card'>
          <div id='flip-card-front' class='cardfrount'>$course_topic<br>$course_category</div>
          <div id='flip-card-back' style='overflow-y: scroll; padding: 20px;'>$course_data</div>
        </div></a>
      </div>"; 
      } else {}
     
        if ($ut == 'admin') {
        echo "
        <a href='module.php?id=$id'><div id='card' class='col-md-4' style='margin-top: 15px;'>
        <div id='flip-card'>
          <div id='flip-card-front' class='cardfrount'>$course_topic<br>$course_category</div>
          <div id='flip-card-back' style='overflow-y: scroll; padding: 20px;'>$course_data</div>
        </div></a>
      </div>"; 
      } else {}?>

    <?php } ?>
<style>
      body::-webkit-scrollbar {
  display: none;
  }
  body {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#flip-card-back::-webkit-scrollbar {
  display: none;
  }
  #flip-card-back {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */
}
#card {
  width: 100%;;
}

#card , #flip-card {
  width: 100%;
  height: 200px;
}

#flip-card {
  transition: transform .5s ease-in-out;
  transform-origin: 50% 50%;
  transform-style: preserve-3d;
}

#flip-card:Hover {
  transform: rotateY(180deg);
}

#flip-card-front {
  position: absolute;
  top: 0;
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
#flip-card-back {
  position: absolute;
  top: 0;
  left: 0;
  justify-content: center;
  align-items: center;
  width: 100%;
  height: 100%;
}
#flip-card-front, #flip-card-back {
  border-radius: 10px;
  backface-visibility: hidden;
  font-family: Verdana;
  font-size: 1em;
}

#flip-card-back {
  box-shadow: 0 0 5px rgb(230,230,230);
  background-color: rgb(230,230,230);
  transform: rotateY(180deg);
  color: #222;
}

#flip-card-front {
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #e6e6ea;
  color: #111;
}


    </style>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>