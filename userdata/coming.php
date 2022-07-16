<!doctype html>
<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php include_once("database/phpmyadmin/header.php"); ?>
<html lang="en">
  <head>
  	<title>Coming - GlowEdu</title>
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
      <img src="images/logo.png" width ="40px">
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
<h3>Don't Click the button!</h3>
<ul class="unordered">
  <li class="list">
    <input type="checkbox" />
    <div class="box">C</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">O</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">M</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">I</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">N</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">G</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box"></div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">S</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">O</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">O</div>
  </li>
  <li class="list">
    <input type="checkbox" />
    <div class="box">N</div>
  </li>
</ul>
<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap');

body {
  margin: 0; 
  height: 100vh;
  background: #e1e5ea;
  font-family: 'Poppins', sans-serif;
  display: flex;
  justify-content: center;
  align-items: center;
}

.unordered {
  position: relative;
  display: flex;
  padding: 250px;
}

.list {
  list-style: none;
}

label {
  position: relative;
}

input[type="checkbox"] {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 80px;
  width: 80px;
  z-index: 100;
}

.box {
  position: relative;
  height: 80px;
  width: 80px;
  background: #18191f;
  color: #555;
  display: flex;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 46px;
  cursor: pointer;
  margin: 0 4px;
  border-radius: 20px;
  box-shadow: -1px -1px 4px rgba(255, 255, 255, 0.05),
    4px 4px 6px rgba(0, 0, 0, 0.2),
    inset -1px -1px 4px rgba(255, 255, 255, 0.05),
    inset 1px 1px 1px rgba(0, 0, 0, 0.1);
}

/* div:before {
  content: "";
  position: absolute;
  top: 2px;
  left: 2px;
  width: 75px;
  height: 38px;
  border-top-left-radius: 20px;
  border-top-right-radius: 20px;
  background: rgba(255, 255, 255, 0.05);
} */

input[type="checkbox"]:checked ~ div {
  box-shadow: inset 0 0 2px rgba(255, 255, 255, 0.05),
    inset 4px 4px 6px rgba(0, 0, 0, 0.2);
  color: yellow;
  text-shadow: 0 0 15px yellow, 0 0 25px yellow;
  animation: glow 5s linear infinite;
}

@keyframes glow {
  0% {
    filter: hue-rotate(0deg);
  }
  100% {
    filter: hue-rotate(360deg);
  }
}
</style>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>