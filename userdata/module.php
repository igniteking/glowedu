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
        $moduleid = $_GET['id'];
        ?>
  	<title>Update - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/css/style.css">
        <?php
        $id = $_GET['id'];
        $query = "SELECT * from courses WHERE id=$id";
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
        $couse_data_final = str_replace("'","&#x27;",$course_data);
        $final_answer = str_replace("'","&#x27;",$answer);
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
  $reg = @$_POST['update'];
  if ($reg) {
    $course_topic = @$_POST['course_topic'];
    $course_category = @$_POST['course_category'];
    $course_data = @$_POST['course_data'];
    $youtube_link = @$_POST['youtube_link'];
    $hints = @$_POST['hints'];
    $answer = @$_POST['answer'];
    $couse_data_final = str_replace("'","&#x27;",$course_data);
    $final_answer = str_replace("'","&#x27;",$answer);
  
    $sql = "UPDATE `courses` SET `course_topic`='$course_topic', `course_category`='$course_category', `course_data`='$couse_data_final',
    `youtube_link`='$youtube_link', `hints`='$hints', `answer`='$final_answer' Where id=$id";
  $rt = mysqli_query($conn, $sql);
  if($rt) {
   echo "Done!";
  } else{
   echo "<h1> ERROR!</h1> ". $sql;
  }
  }
?>
<h2 class="mb-4">Update Courses Form</h2>
<form method="POST" action='module.php?id=<?php echo $id;?>' class="register-form" id="register-form">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" name="course_topic" value="<?php echo $course_topic ;?>"/>
        <label class="form-label" for="form6Example1">Course Topic</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
      <select class="form-control" id="exampleFormControlSelect1" name="course_category">
      <option>Python</option>
    </select>
        <label class="form-label" for="form6Example2">Course Category</label>
      </div>
    </div>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea class="form-control" id="form6Example7" rows="4" name="course_data" ><?php echo $course_data ?></textarea>
    <label class="form-label" for="form6Example7">Course Data</label>
  </div>
  
  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example3" class="form-control" name="youtube_link" value="<?php echo $youtube_link ?>"/>
    <label class="form-label" for="form6Example3">Resource Link</label>
  </div>

  <!-- Text input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example4" class="form-control" name="hints" value="<?php echo $hints ?>"/>
    <label class="form-label" for="form6Example4">hints</label>
  </div>

  <!-- Message input -->
  <div class="form-outline mb-4">
    <textarea class="form-control" id="form6Example7" rows="4" name="answer"><?php echo $answer ?></textarea>
    <label class="form-label" for="form6Example7">Answer</label>
  </div>

  <!-- Submit button -->
  <div style="padding: 15px;">
  <input type="submit" name="update" id="signup" class="form-update" value="Update" style="float: left; width: 40%; padding: 10px; font-weight: 600; color: #fff; background: #3580ff; border: 1px solid #3580ff; border-radius: 4px; cursor: pointer; font-size: 14px; margin-top: 20px;">
  <br><a href="delmod.php?id=<?php echo $moduleid;?>"><button style='width:40%; float: right; padding: 10px; font-weight: 600; color: #fff;' type='button' class='btn btn-danger'>Delete</button></a>
  </div>
  </form>

<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>