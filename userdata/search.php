<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
<title>Search - GlowEdu</title>

<head>
    <?php
    if (isset($_SESSION['email'])) {
    } else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=login.php\">";
        exit();
    }
    
    $q = @$_GET['find'];
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
        <form action="search.php" method="GET">
            <input type="text" name="q" placeholder="Find your questions and all the python modules..." value="<?php echo $q;?>" style="width: 90%; padding-top: 10px; padding-bottom: 10px; border: 1px solid #ccc; border: 0 none; border-bottom: 2px solid #eee; outline: none; background: #fcfcfc; padding-left: 10px;" />
            <input type="submit" name="find" value="Search" style="width: 9%; background: #67ce8b; color: #fff; border: 0 none; padding-top: 10px; padding-bottom: 10px;" />
        </form>
        <?php
        $output = "";
        $submit = @$_GET['find'];
        $query = strip_tags(@$_GET['find']);
        if ($submit) {
            $search = "SELECT * FROM courses WHERE course_topic LIKE '%$q%' LIMIT 20";
            $query = mysqli_query($conn, $search);
            while ($row = mysqli_fetch_assoc($query)) {
                $course = $row['id'];
                $course_topic = $row['course_topic'];
                $course_data = $row['answer'];
                $course_category = $row['course_category'];
        ?>
        <?php
                echo $output = "<a href='python.php?id=$course'><div id='card' class='col-md-4' style='float: left; margin-top: 15px;'>
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
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }

            #flip-card-back::-webkit-scrollbar {
                display: none;
            }

            #flip-card-back {
                -ms-overflow-style: none;
                /* IE and Edge */
                scrollbar-width: none;
                /* Firefox */
            }

            #card {
                width: 100%;
                ;
            }

            #card,
            #flip-card {
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

            #flip-card-front,
            #flip-card-back {
                border-radius: 10px;
                backface-visibility: hidden;
                font-family: Verdana;
                font-size: 1em;
            }

            #flip-card-back {
                box-shadow: 0 0 5px rgb(230, 230, 230);
                background-color: rgb(230, 230, 230);
                transform: rotateY(180deg);
                color: #222;
            }

            #flip-card-front {
                border: 2px dashed #888;
                background-color: #eee;
                color: #333;
            }
        </style>


        <script src="js/jquery.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>