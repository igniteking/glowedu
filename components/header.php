<?php include('./components/head_include.php') ?>
<?php include('./includes/connection.php'); ?>
<?php include('./includes/global.php'); ?>
<?php

if (isset($_SESSION["email"])) {
  $email = $_SESSION["email"];
} else {
  header('Location: logout.php');
  die();
}
?>

<body>
  <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header fixed-footer">
    <div class="app-header header-shadow">
      <div class="app-header__logo">
        <img src="./assets/images/logo.png" width="50" alt="">
        <div class="header__pane ml-auto">
          <div>
            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
      </div>
      <div class="app-header__mobile-menu">
        <div>
          <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
            <span class="hamburger-box">
              <span class="hamburger-inner"></span>
            </span>
          </button>
        </div>
      </div>
      <div class="app-header__menu">
        <span>
          <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
            <span class="btn-icon-wrapper">
              <i class="fa fa-ellipsis-v fa-w-6"></i>
            </span>
          </button>
        </span>
      </div>
      <div class="app-header__content">
        <div class="app-header-left">
          <div class="search-wrapper">
            <div class="input-holder">
              <form action="searched.php" method="GET">
                <input type="text" class="search-input" name="adhar" placeholder="Type Adhar Number & Press Enter to search" />
              </form>
              <button class="search-icon"><span></span></button>
            </div>
            <button class="close"></button>
          </div>
          <ul class="header-menu nav">
            <li class="nav-item">
              <a href="index.php" class="nav-link">
                <i class="nav-link-icon fa fa-database"> </i>
                Dashboard
              </a>
            </li>
            <li class="btn-group nav-item">
              <a href="student_list.php" class="nav-link">
                <i class="nav-link-icon fa fa-edit"></i>
                Student List
              </a>
            </li>
            <li class="dropdown nav-item">
              <a href="profile.php" class="nav-link">
                <i class="nav-link-icon fa fa-cog"></i>
                Settings
              </a>
            </li>
          </ul>
        </div>
        <div class="app-header-right">
          <div class="header-btn-lg pr-0">
            <div class="widget-content p-0">
              <div class="widget-content-wrapper">
                <div class="widget-content-left">
                  <div class="btn-group">
                    <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                      <img width="42" class="rounded-circle" src="./userdata/<?php echo $profile_pic; ?>" alt="" />
                      <i class="fa fa-angle-down ml-2 opacity-8"></i>
                    </a>
                    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                      <a href="search.php"><button type="button" tabindex="0" class="dropdown-item">Resume Creator</button></a>
                      <a href="profile.php"><button type="button" tabindex="0" class="dropdown-item">Profile</button></a>
                      <div tabindex="-1" class="dropdown-divider"></div>
                      <a href="logout.php"><button type="button" tabindex="0" class="dropdown-item">Logout</button></a>
                    </div>
                  </div>
                </div>
                <div class="widget-content-left ml-3 header-user-info">
                  <div class="widget-heading"> <?php echo $username; ?> </div>
                  <div class="widget-subheading"> <?php echo $email; ?> </div>
                </div>
                <div class="widget-content-right header-user-info ml-3">
                  <a href="logout.php"><button type="button" class="btn btn-shadow p-1 btn btn-primary">
                      <strong>Logout</strong> <i class="fa text-white fa-share-square pr-1 pl-1"></i>
                    </button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="app-main">
      <div class="app-sidebar sidebar-shadow">
        <div class="app-header__logo">
          <div class="logo-src"></div>
          <div class="header__pane ml-auto">
            <div>
              <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                <span class="hamburger-box">
                  <span class="hamburger-inner"></span>
                </span>
              </button>
            </div>
          </div>
        </div>
        <div class="app-header__mobile-menu">
          <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
              <span class="hamburger-box">
                <span class="hamburger-inner"></span>
              </span>
            </button>
          </div>
        </div>
        <div class="app-header__menu">
          <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
              <span class="btn-icon-wrapper">
                <i class="fa fa-ellipsis-v fa-w-6"></i>
              </span>
            </button>
          </span>
        </div>
        <div class="scrollbar-sidebar">
          <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
              <li class="app-sidebar__heading">Dashboards</li>
              <?php
              $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
              if ($curPageName == 'index.php') {
                echo '<li>
                  <a href="index.php" class="mm-active">
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Dashboard
                  </a>
                </li>';
              } else {
                echo '<li>
                <a href="index.php" class="">
                  <i class="metismenu-icon pe-7s-rocket"></i>
                  Dashboard
                </a>
              </li>';
              }
              ?>

              <li class="app-sidebar__heading">Student Details</li>
              <?php $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
              if ($curPageName == '.php') {
                echo '<li>
                <a href="#" class="mm-active">
                  <i class="metismenu-icon pe-7s-users"></i>
                  Resume Management
                  <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>';
              } else {
                echo '<li>
                <a href="#" >
                  <i class="metismenu-icon pe-7s-users"></i>
                  Resume Management
                  <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                </a>';
              } ?>
              <ul>
                <li>
                  <a href="student_form.php">
                    <i class="metismenu-icon"></i>
                    Student Form
                  </a>
                </li>
                <li>
                  <a href="student_list.php">
                    <i class="metismenu-icon"> </i>Student List
                  </a>
                </li>
              </ul>
              </li>
              <li class="app-sidebar__heading">Resume Management</li>
              <?php $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
              if ($curPageName == 'resume_form.php') {
                echo '<li>
                <a href="resume_form.php" class="mm-active">
                <i class="metismenu-icon pe-7s-note2"></i>
                  Resume Management
                </a>
              </li>';
              } else {
                echo '<li>
                <a href="resume_form.php">
                <i class="metismenu-icon pe-7s-note2"></i>
                  Resume Management
                </a>
              </li>';
              }
              ?>
              <li class="app-sidebar__heading">Group Discussions</li>
              <?php $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
              if ($curPageName == 'group_dis.php') {
                echo '<li>
                <a href="group_dis.php" class="mm-active">
                <i class="metismenu-icon pe-7s-wallet"></i>
                Group Discussions
                </a>
              </li>';
              } else {
                echo '<li>
                <a href="group_dis.php">
                <i class="metismenu-icon pe-7s-wallet"></i>
                Group Discussions
                </a>
              </li>';
              }
              ?>
              <li class="app-sidebar__heading">Settings</li>
              <?php $curPageName = substr($_SERVER["SCRIPT_NAME"], strrpos($_SERVER["SCRIPT_NAME"], "/") + 1);
              if ($curPageName == 'profile.php') {
                echo '<li>
                <a href="profile.php" class="mm-active">
                  <i class="metismenu-icon pe-7s-display2"> </i>Profile
                </a>
              </li>';
              } else {
                echo '<li>
                <a href="profile.php">
                  <i class="metismenu-icon pe-7s-display2"> </i>Profile
                </a>
              </li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>