<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
<title>My Progress - GlowEdu</title>

<head>
    <?php
    if (isset($_SESSION['email'])) {
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
        exit();
    }
    ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/css/style.css">

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
      <img src="images/main.png" width ="50px">
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
        $sql = "SELECT * FROM courses";
        $query = mysqli_query($conn, $sql);
        $count_total_course = mysqli_num_rows($query);

        $sql2 = "SELECT * FROM match_id WHERE student_id='$user_id'";
        $query2 = mysqli_query($conn, $sql2);
        $count_total_course_done = mysqli_num_rows($query2);

        //Algorithm Part
        $count = $count_total_course_done / $count_total_course * 100;
        $count_final = bcdiv($count, 1, 0);
        ?>
        <h1>Completed Modules <i class="fa fa-check" aria-hidden="true" style="color: #67ce8b;"></i></h1>
        <div style='margin-top: 20px; margin-bottom: 20px; width: 100%; border-radius: 8px; box-shadow: 1px 10px 10px #ccc;'>
            <div id="progress">
                COMPLETED <?php echo $count_final ?>%
            </div>
        </div>
        <style type="text/css">
            #progress {
                padding: 10px;
                color: #fff;
                font-family: Consolas, monaco, monospace;
                border-radius: 8px;
                background: rgb(0, 0, 0);
                background: linear-gradient(90deg, rgba(0, 0, 0, 1) 0%, rgba(45, 48, 47, 1) 61%, rgba(29, 29, 29, 1) 100%);
                transition: all 5s ease;
                animation: imganim 2s linear both;
            }

            @keyframes imganim {
                from {
                    width: 0px;
                    padding: 10px;
                }

                to {
                    padding: 10px;
                    width: <?php echo $count_final; ?>%;
                }
            }
        </style>
        <?php
        $sql = "SELECT * FROM match_id WHERE student_id='$user_id'";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($query)) {
            $course = $row['course_id'];
            $sql2 = "SELECT * FROM courses WHERE id='$course'";
            $query2 = mysqli_query($conn, $sql2);
            while ($row = mysqli_fetch_assoc($query2)) {
                $course_topic = $row['course_topic'];
                $course_data = $row['answer'];
                $course_category = $row['course_category'];
                echo "<a href='python.php?id=$course'><div id='card' class='col-md-4' style='float: left; margin-top: 15px;'>
                <div id='flip-card'>
                  <div id='flip-card-front' class='cardfrount'>$course_topic<br>$course_category</div>
                  <div id='flip-card-back' style='overflow-y: scroll; padding: 20px;'>$course_data</div>
                </div></a>
              </div>";
            }
        }
        ?>
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
 border: 1px dashed black;
  box-shadow: 0 0 5px rgb(22,22,22);
  background-color: #67ce8b;
  color: #fff;
}
</style>

        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>