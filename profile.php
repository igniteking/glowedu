<?php include('./components/header.php') ?>
<?php include('./includes/global.php'); ?>
<title>Profile || Glowedu</title>
<div class="app-main__outer">
    <div class="app-main__inner">
        <!-- //STUDENT -->
        <?php if ($user_type == 'student') { ?>
            <div class="row">
                <div class="col-md-12 col-xl-3 animated bounceIn">
                    <div class="card mb-3 widget-content bg-primary">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content">
                                <div class="widget-heading">
                                    <img class="rounded img-thumbnail" src="<?php echo $profile_pic; ?>" alt="" />
                                </div>
                                <br>
                                <?php
                                $query = "SELECT * FROM student_data WHERE student_email = '$email'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $verified = $row['verified'];
                                    $student_bio = $row['student_bio'];
                                    $student_address = $row['student_address'];
                                    $student_mobile = $row['student_mobile'];
                                }
                                if ($verified == "1") {
                                    echo "
                                    <h4>$username
                                        <i class='rounded-circle fa fa-check'></i>
                                    </h4>
                                    <h5>@$user_type</h5>
                                    <p>$student_bio</p>
                                    <h6><i class='rounded-circle fa fa-map-marker'></i> $student_address</h6>
                                    <h6><i class='rounded-circle fa fa-phone'></i> $student_mobile</h6>
                                    <h6><i class='rounded-circle fa fa-envelope'></i> $email</h6>";
                                } else {
                                    echo "<h4>$username
                                </h4>
                                <h5>@$user_type</h5>
                                <p>$student_bio</p>
                                <h6><i class='rounded-circle fa fa-map-marker'></i> $student_address</h6>
                                <h6><i class='rounded-circle fa fa-phone'></i> $student_mobile</h6>
                                <h6><i class='rounded-circle fa fa-envelope'></i> $email</h6>";
                                }
                                ?></h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                <span>My Discustion Topics</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <?php
                                    $submit = @$_POST['submit'];
                                    $new_user_name = strip_tags(@$_POST['username']);
                                    $new_bio = strip_tags(@$_POST['bio']);
                                    $new_mobile = strip_tags(@$_POST['mobile']);
                                    $new_address = strip_tags(@$_POST['address']);
                                    $profile_picture = strip_tags(@$_POST['profile_picture']);
                                    if ($submit) {
                                        if (empty($profile_picture)) {
                                            // UPLOADING PROFILE PIC
                                            $length = 10;
                                            $random = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                                            $folder = mkdir("./addons/user_data/student_picture/$random");
                                            $target_dir = "./addons/user_data/student_picture/$random/";
                                            $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
                                            $uploadOk = 1;
                                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                                                $profile_picture = htmlspecialchars(basename($_FILES["profile_picture"]["name"]));
                                            } else {
                                                echo "Sorry, there was an error uploading your file.";
                                            }
                                        }

                                        $insert_student = "UPDATE `student_data` SET `student_name`='$new_user_name',`student_mobile`='$new_mobile',`student_address`='$new_address',`student_bio`='$new_bio' WHERE student_email = '$email'";
                                        $query_insertation_result = mysqli_query($conn, $insert_student);
                                        if (!empty($profile_picture)) {
                                            $update_student = "UPDATE `user_data` SET `username`='$new_user_name',`profile_picture`='$target_dir$profile_picture' WHERE email = '$email'";
                                            $query_insertation = mysqli_query($conn, $update_student);
                                        } else {
                                            $update_student = "UPDATE `user_data` SET `username`='$new_user_name' WHERE email = '$email'";
                                            $query_insertation = mysqli_query($conn, $update_student);
                                        }
                                        if ($query_insertation_result) {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #b7e4c7"><h6 style="text-align: center; color: #000; margin: 5px;">Inserted Successfully!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"2; url=profile.php\">";
                                        } else {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Error Inserting Record!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"3; url=profile.php\">";
                                        }
                                    }
                                    ?>
                                    <h5 class="card-title">Resume Form</h5>
                                    <form method="post" action="profile.php" enctype="multipart/form-data" class="needs-validation">
                                        <div class="form-row">
                                            <?php
                                            $query = "SELECT * FROM student_data WHERE student_email = '$email'";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $verified = $row['verified'];
                                                $student_name = $row['student_name'];
                                                $bio = $row['student_bio'];
                                                $address = $row['student_address'];
                                                $mobile = $row['student_mobile'];
                                            } ?>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">User Name</label>
                                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $student_name ?>" name="username" placeholder="Username" />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">User E-mail</label>
                                                <input type="email" class="form-control" id="validationCustom02" name="email" disabled="disabled" value="<?php echo $email ?>" placeholder="Your E-mail" />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">User Bio</label>
                                                <div class="input-group">
                                                    <textarea type="text" class="form-control" id="validationCustomUsername" name="bio" placeholder="About Yourself" aria-describedby="inputGroupPrepend"><?php echo ($bio); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom03">User Address</label>
                                                <textarea type="text" class="form-control" id="validationCustom03" name="address" placeholder="Student Address"><?php echo ($address); ?></textarea>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">User Mobile Number</label>
                                                <input type="tel" class="form-control" id="validationCustom04" placeholder="Student Mobile Number" value="<?php echo $mobile ?>" name="mobile" />
                                            </div>
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">User Picture</label><input name="profile_picture" id="exampleAddress" type="file" class="form-control"></div>
                                            <input class="btn btn-primary col-12" name="submit" type="submit" value="Submit form"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-6">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss">
                                            </i>
                                            New Courses
                                        </div>
                                        <ul class="nav">
                                            <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">New</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">New Courses</h6>
                                                <div class="scroll-area-sm">
                                                    <div class="scrollbar-container">
                                                        <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                            <?php
                                                            $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 10";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                                $course_topic = $rows['course_topic'];
                                                                $course_category = $rows['course_category'];
                                                                echo "
                                                <li class='list-group-item'>
                                                <div class='widget-content p-0'>
                                                    <div class='widget-content-wrapper'>
                                                        <div class='widget-content-left'>
                                                            <div class='widget-heading'>$course_topic</div>
                                                            <div class='widget-subheading'>$course_category</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                                ";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure">
                                            </i>
                                            Progress Indicators
                                        </div>
                                        <div class="btn-actions-pane-right">
                                            <div class="nav">
                                                <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Tab 1</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane fade active show" id="tab-eg-55">
                                            <div class="widget-chart p-3">
                                                <div class="widget-chart-content text-center">
                                                    <div class="widget-description mt-0 text-warning">
                                                        <i class="fa fa-arrow-left"></i>
                                                        <span class="pl-1">GO to the progress pages |</span>
                                                        <span class="text-muted opacity-8 pl-1">| Buy new modules to get more study material!!</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pt-2 card-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="widget-content">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-numbers fsize-3 text-muted">
                                                                            <?php
                                                                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'python'";
                                                                            $result = mysqli_query($conn, $query);
                                                                            echo $rowcount = mysqli_num_rows($result);
                                                                            ?>%
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="text-muted opacity-6">Python</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-progress-wrapper mt-1">
                                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount ?>%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="widget-content">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-numbers fsize-3 text-muted">
                                                                            <?php
                                                                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'javascript'";
                                                                            $result = mysqli_query($conn, $query);
                                                                            echo $rowcount = mysqli_num_rows($result);
                                                                            ?>%
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="text-muted opacity-6">Javascript</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-progress-wrapper mt-1">
                                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="widget-content">
                                                            <div class="widget-content-outer">
                                                                <div class="widget-content-wrapper">
                                                                    <div class="widget-content-left">
                                                                        <div class="widget-numbers fsize-3 text-muted">
                                                                            <?php
                                                                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'cc_plus'";
                                                                            $result = mysqli_query($conn, $query);
                                                                            echo $rowcount = mysqli_num_rows($result);
                                                                            ?>%
                                                                        </div>
                                                                    </div>
                                                                    <div class="widget-content-right">
                                                                        <div class="text-muted opacity-6">C & C ++</div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-progress-wrapper mt-1">
                                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabs-animation fade show" id="tab-content-1" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                high
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- //Teacher -->
        <?php } elseif ($user_type == 'teacher') { ?>
            <div class="row">
                <div class="col-md-12 col-xl-3 animated bounceIn">
                    <div class="card mb-3 widget-content bg-primary">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content">
                                <div class="widget-heading">
                                    <img class="rounded img-thumbnail" src="<?php echo $profile_pic; ?>" alt="" />
                                </div>
                                <br>
                                <?php
                                $query = "SELECT * FROM teacher_data WHERE teacher_email = '$email'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $verified = $row['verified'];
                                    $teacher_bio = $row['teacher_bio'];
                                    $teacher_address = $row['teacher_address'];
                                    $teacher_mobile = $row['teacher_mobile'];
                                }
                                if ($verified == "1") {
                                    echo "
                                    <h4>$username
                                        <i class='rounded-circle fa fa-check'></i>
                                    </h4>
                                    <h5>@$user_type</h5>
                                    <p>$teacher_bio</p>
                                    <h6><i class='rounded-circle fa fa-map-marker'></i> $teacher_address</h6>
                                    <h6><i class='rounded-circle fa fa-phone'></i> $teacher_mobile</h6>
                                    <h6><i class='rounded-circle fa fa-envelope'></i> $email</h6>";
                                } else {
                                    echo "<h4>$username
                                </h4>
                                <h5>@$user_type</h5>
                                <p>$teacher_bio</p>
                                <h6><i class='rounded-circle fa fa-map-marker'></i> $teacher_address</h6>
                                <h6><i class='rounded-circle fa fa-phone'></i> $teacher_mobile</h6>
                                <h6><i class='rounded-circle fa fa-envelope'></i> $email</h6>";
                                }
                                ?></h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                <span>My Discustion Topics</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <?php
                                    $submit = @$_POST['submit'];
                                    $new_user_name = strip_tags(@$_POST['username']);
                                    $new_bio = strip_tags(@$_POST['bio']);
                                    $new_mobile = strip_tags(@$_POST['mobile']);
                                    $new_address = strip_tags(@$_POST['address']);
                                    $profile_picture = strip_tags(@$_POST['profile_picture']);
                                    if ($submit) {
                                        if (empty($profile_picture)) {
                                            // UPLOADING PROFILE PIC
                                            $length = 10;
                                            $random = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                                            $folder = mkdir("./addons/user_data/teacher_picture/$random");
                                            $target_dir = "./addons/user_data/teacher_picture/$random/";
                                            $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
                                            $uploadOk = 1;
                                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                                                $profile_picture = htmlspecialchars(basename($_FILES["profile_picture"]["name"]));
                                            } else {
                                                echo "Sorry, there was an error uploading your file.";
                                            }
                                        }

                                        $insert_teacher = "UPDATE `teacher_data` SET `teacher_name`='$new_user_name',`teacher_mobile`='$new_mobile',`teacher_address`='$new_address',`teacher_bio`='$new_bio' WHERE teacher_email = '$email'";
                                        $query_insertation_result = mysqli_query($conn, $insert_teacher);
                                        if (!empty($profile_picture)) {
                                            $update_teacher = "UPDATE `user_data` SET `username`='$new_user_name',`profile_picture`='$target_dir$profile_picture' WHERE email = '$email'";
                                            $query_insertation = mysqli_query($conn, $update_teacher);
                                        } else {
                                            $update_teacher = "UPDATE `user_data` SET `username`='$new_user_name' WHERE email = '$email'";
                                            $query_insertation = mysqli_query($conn, $update_teacher);
                                        }
                                        if ($query_insertation_result) {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #b7e4c7"><h6 style="text-align: center; color: #000; margin: 5px;">Inserted Successfully!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"2; url=profile.php\">";
                                        } else {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Error Inserting Record!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"3; url=profile.php\">";
                                        }
                                    }
                                    ?>
                                    <h5 class="card-title">Resume Form</h5>
                                    <form method="post" action="profile.php" enctype="multipart/form-data" class="needs-validation">
                                        <div class="form-row">
                                            <?php
                                            $query = "SELECT * FROM teacher_data WHERE teacher_email = '$email'";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $verified = $row['verified'];
                                                $teacher_name = $row['teacher_name'];
                                                $bio = $row['teacher_bio'];
                                                $address = $row['teacher_address'];
                                                $mobile = $row['teacher_mobile'];
                                            } ?>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">User Name</label>
                                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $teacher_name ?>" name="username" placeholder="Username" required />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">User E-mail</label>
                                                <input type="email" class="form-control" id="validationCustom02" name="email" disabled="disabled" value="<?php echo $email ?>" placeholder="Your E-mail" required />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">User Bio</label>
                                                <div class="input-group">
                                                    <textarea type="text" class="form-control" id="validationCustomUsername" name="bio" placeholder="About Yourself" aria-describedby="inputGroupPrepend" required><?php echo ($bio); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom03">User Address</label>
                                                <textarea type="text" class="form-control" id="validationCustom03" name="address" placeholder="teacher Address" required><?php echo ($address); ?></textarea>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">User Mobile Number</label>
                                                <input type="tel" class="form-control" id="validationCustom04" placeholder="teacher Mobile Number" value="<?php echo $mobile ?>" name="mobile" required />
                                            </div>
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">User Picture</label><input name="profile_picture" id="exampleAddress" type="file" class="form-control"></div>
                                            <input class="btn btn-primary col-12" name="submit" type="submit" value="Submit form"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss">
                                            </i>
                                            New Courses
                                        </div>
                                        <ul class="nav">
                                            <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">New</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">New Courses</h6>
                                                <div class="scroll-area-sm">
                                                    <div class="scrollbar-container">
                                                        <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                            <?php
                                                            $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 10";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                                $course_topic = $rows['course_topic'];
                                                                $course_category = $rows['course_category'];
                                                                echo "
                                                <li class='list-group-item'>
                                                <div class='widget-content p-0'>
                                                    <div class='widget-content-wrapper'>
                                                        <div class='widget-content-left'>
                                                            <div class='widget-heading'>$course_topic</div>
                                                            <div class='widget-subheading'>$course_category</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                                ";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabs-animation fade show" id="tab-content-1" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                high
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- //UNIVERSITY -->
        <?php } else { ?>
            <div class="row">
                <div class="col-md-12 col-xl-3 animated bounceIn">
                    <div class="card mb-3 widget-content bg-primary">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content">
                                <div class="widget-heading">
                                    <img class="rounded img-thumbnail" src="<?php echo $profile_pic; ?>" alt="" />
                                </div>
                                <br>
                                <?php
                                $query = "SELECT * FROM university_data WHERE university_email = '$email'";
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                    $verified = $row['verified'];
                                    $university_bio = $row['university_bio'];
                                    $university_address = $row['university_address'];
                                    $university_mobile = $row['university_mobile'];
                                }
                                if ($verified == "1") {
                                    echo "
                                    <h4>$username
                                        <i class='rounded-circle fa fa-check'></i>
                                    </h4>
                                    <h5>@$user_type</h5>
                                    <p>$university_bio</p>
                                    <h6><i class='rounded-circle fa fa-map-marker'></i> $university_address</h6>
                                    <h6><i class='rounded-circle fa fa-phone'></i> $university_mobile</h6>
                                    <h6><i class='rounded-circle fa fa-envelope'></i> $email</h6>";
                                } else {
                                    echo "<h4>$username
                                </h4>
                                <h5>@$user_type</h5>
                                <p>$university_bio</p>
                                <h6><i class='rounded-circle fa fa-map-marker'></i> $university_address</h6>
                                <h6><i class='rounded-circle fa fa-phone'></i> $university_mobile</h6>
                                <h6><i class='rounded-circle fa fa-envelope'></i> $email</h6>";
                                }
                                ?></h4>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-xl-9">
                    <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                        <li class="nav-item">
                            <a role="tab" class="nav-link active" id="tab-0" data-toggle="tab" href="#tab-content-0">
                                <span>Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                                <span>My Discustion Topics</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <?php
                                    $submit = @$_POST['submit'];
                                    $new_user_name = strip_tags(@$_POST['username']);
                                    $new_bio = strip_tags(@$_POST['bio']);
                                    $new_mobile = strip_tags(@$_POST['mobile']);
                                    $new_address = strip_tags(@$_POST['address']);
                                    $profile_picture = strip_tags(@$_POST['profile_picture']);
                                    if ($submit) {
                                        if (empty($profile_picture)) {
                                            // UPLOADING PROFILE PIC
                                            $length = 10;
                                            $random = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                                            $folder = mkdir("./addons/user_data/university_picture/$random");
                                            $target_dir = "./addons/user_data/university_picture/$random/";
                                            $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
                                            $uploadOk = 1;
                                            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                                                $profile_picture = htmlspecialchars(basename($_FILES["profile_picture"]["name"]));
                                            } else {
                                                echo "Sorry, there was an error uploading your file.";
                                            }
                                        }

                                        $insert_university = "UPDATE `university_data` SET `university_name`='$new_user_name',`university_mobile`='$new_mobile',`university_address`='$new_address',`university_bio`='$new_bio' WHERE university_email = '$email'";
                                        $query_insertation_result = mysqli_query($conn, $insert_university);
                                        if (!empty($profile_picture)) {
                                            $update_university = "UPDATE `user_data` SET `username`='$new_user_name',`profile_picture`='$target_dir$profile_picture' WHERE email = '$email'";
                                            $query_insertation = mysqli_query($conn, $update_university);
                                        } else {
                                            $update_university = "UPDATE `user_data` SET `username`='$new_user_name' WHERE email = '$email'";
                                            $query_insertation = mysqli_query($conn, $update_university);
                                        }
                                        if ($query_insertation_result) {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #b7e4c7"><h6 style="text-align: center; color: #000; margin: 5px;">Inserted Successfully!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"2; url=profile.php\">";
                                        } else {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Error Inserting Record!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"3; url=profile.php\">";
                                        }
                                    }
                                    ?>
                                    <h5 class="card-title">Resume Form</h5>
                                    <form method="post" action="profile.php" enctype="multipart/form-data" class="needs-validation">
                                        <div class="form-row">
                                            <?php
                                            $query = "SELECT * FROM university_data WHERE university_email = '$email'";
                                            $result = mysqli_query($conn, $query);
                                            while ($row = mysqli_fetch_array($result)) {
                                                $verified = $row['verified'];
                                                $university_name = $row['university_name'];
                                                $bio = $row['university_bio'];
                                                $address = $row['university_address'];
                                                $mobile = $row['university_mobile'];
                                            } ?>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom01">User Name</label>
                                                <input type="text" class="form-control" id="validationCustom01" value="<?php echo $university_name ?>" name="username" placeholder="Username" required />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom02">User E-mail</label>
                                                <input type="email" class="form-control" id="validationCustom02" name="email" disabled="disabled" value="<?php echo $email ?>" placeholder="Your E-mail" required />
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustomUsername">User Bio</label>
                                                <div class="input-group">
                                                    <textarea type="text" class="form-control" id="validationCustomUsername" name="bio" placeholder="About Yourself" aria-describedby="inputGroupPrepend" required><?php echo ($bio); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom03">User Address</label>
                                                <textarea type="text" class="form-control" id="validationCustom03" name="address" placeholder="university Address" required><?php echo ($address); ?></textarea>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <label for="validationCustom04">User Mobile Number</label>
                                                <input type="tel" class="form-control" id="validationCustom04" placeholder="university Mobile Number" value="<?php echo $mobile ?>" name="mobile" required />
                                            </div>
                                            <div class="position-relative form-group"><label for="exampleAddress" class="">User Picture</label><input name="profile_picture" id="exampleAddress" type="file" class="form-control"></div>
                                            <input class="btn btn-primary col-12" name="submit" type="submit" value="Submit form"></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="mb-3 card">
                                    <div class="card-header-tab card-header-tab-animation card-header">
                                        <div class="card-header-title">
                                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss">
                                            </i>
                                            New Courses
                                        </div>
                                        <ul class="nav">
                                            <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">New</a></li>
                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">New Courses</h6>
                                                <div class="scroll-area-sm">
                                                    <div class="scrollbar-container">
                                                        <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                                            <?php
                                                            $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 10";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                                $course_topic = $rows['course_topic'];
                                                                $course_category = $rows['course_category'];
                                                                echo "
                                                <li class='list-group-item'>
                                                <div class='widget-content p-0'>
                                                    <div class='widget-content-wrapper'>
                                                        <div class='widget-content-left'>
                                                            <div class='widget-heading'>$course_topic</div>
                                                            <div class='widget-subheading'>$course_category</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                                ";
                                                            }
                                                            ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane tabs-animation fade show" id="tab-content-1" role="tabpanel">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                high
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?php include('./components/footer.php'); ?>
<?php include('./components/scripts.php'); ?>