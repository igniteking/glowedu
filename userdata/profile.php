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
    $query = "SELECT * from users WHERE email = '" . $_SESSION['email'] . "'";
    $result = mysqli_query($conn, $query);

    while ($rows = mysqli_fetch_assoc($result)) {
        $user = $rows['username'];
        $email = $rows['email'];
        $mobile_number = $rows['mobile'];
        $bio = $rows['bio'];
        $state = $rows['state'];
        $postalcode = $rows['postalcode'];
        $education = $rows['education'];
        $country = $rows['country'];
        $additional = $rows['additional'];
        $active = $rows['active'];
        $email_active = $rows['active'];
        if ($email_active == "0") {
            $email_active = "<f style='color: #f04040; font-weight: bold;'>Not Verified</f>";
        } else {
            $email_active = "<f style='color: #6cb038; font-weight: bold;'><i class='fa fa-check' aria-hidden='true'></i> Verified</f>";
        }
        $email_mobile_otp = $rows['mobile_otp'];
        $mobile_count_active = $rows['mobile_active'];
        $mobile_active = $rows['mobile_active'];
        if ($mobile_active == "") {
            $mobile_active = "0";
        }
        if ($mobile_active == "0") {
            $mobile_active = "<f style='color: #f04040; font-weight: bold;'>Not Verified</f>";
        } else {
            $mobile_active = "<f style='color: #6cb038; font-weight: bold;'><i class='fa fa-check' aria-hidden='true'></i> Verified</f>";
        }
    }
    ?>
    <title>Profile - GlowEdu</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
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
                            <img src="images/main.png" width="40px">
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
                                        <input type="search" id="form1" name="find" class="form-control" placeholder="Search" />
                                </div>
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
        if (isset($_POST['save_profile'])) {
            $user = $_POST['username'];
            $bio = $_POST['bio'];
            $state = $_POST['state'];
            $postalcode = $_POST['postalcode'];
            $education = $_POST['education'];
            $country = $_POST['country'];
            $additional = $_POST['additional'];

            $sql = "UPDATE `users` SET `username`='$user', `bio`='$bio',
         `state`='$state', `postalcode`='$postalcode', `education`='$education', `country`='$country', `additional`='$additional' WHERE email='$email'";
            $rt = mysqli_query($conn, $sql);
            if ($rt) {
                echo "Done!";
            } else {
                echo "<h1> ERROR!</h1> " . $sql;
            }
        }

        ?>
        <h2 class="" style="float: left;">Edit Profile</h2><a href="report.php" target="_blank"><button type="button" onclick="showAlert()" style="float: right;" class="btn btn-outline-danger float-right"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Report</button></a>
        <br>
        <script>
            function showAlert() {
                alert("Hello! Please Take a Screen Shot For Our Reference!!..");
            }
        </script>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">

                    <?php
                    $check_pic = mysqli_query($conn, "SELECT profile_pic from users WHERE email = '$email'");
                    $get_pic_row = mysqli_fetch_assoc($check_pic);
                    $profile_pic_db = $get_pic_row['profile_pic'];
                    if ($profile_pic_db == "") {
                        $profile_pic2 = "<div class='d-flex flex-column align-items-center text-center p-3 py-5'><img class='rounded-circle mt-5' width='150px' src='images/user.png'><br><span class='font-weight-bold'>$user</span><span class='text-black-50'>$email</span></div>";
                        echo $profile_pic2;
                    } else {
                        $profile_pic2 = "userdata/" . $profile_pic_db;
                        echo "<div class='d-flex flex-column align-items-center text-center p-3 py-5'><img class='rounded-circle mt-3' width='150px' height='150px;' src='$profile_pic2'><br><br><span class='font-weight-bold'>$user</span><span class='text-black-50'>$email</span><span> </span></div>";
                    }
                    ?>

                    <?php
                    $otp_field = "";
                    $otp_resend = "";
                    $otp = @$_POST['otp'];
                    $otp_resend = @$_POST['otp_resend'];
                    $mobile = strip_tags(@$_POST['mobile']);
                    $otp_verify = strip_tags(@$_POST['otp_verify']);
                    if ($otp_resend) {
                        //file_get_contents("https://api.authkey.io/request?authkey=7f42f5c007696345&mobile=$mobile&country_code=91&sid=734&name=Rohan&otp=$mobile_otp");
                        $otp_field = "<br><div class='col-md-12'><label class='labels'>Please Check Your Mobile</label><input type='number' name='otp_verify' class='form-control' placeholder='Enter OTP'></div><br>";
                        $otp_resend = '<div class="mt-2 text-center"><button class="btn btn-primary profile-button" id="resend_disable" name="otp_resend" value="Update" disabled="disabled">Resend OTP</button></div>';
                    }
                    if ($otp) {
                        if (strlen($mobile) == 10) {
                            if (!$otp_verify) {
                                //file_get_contents("https://api.authkey.io/request?authkey=7f42f5c007696345&mobile=$mobile&country_code=91&sid=734&name=Rohan&otp=$mobile_otp");
                                $otp_field = "<br><div class='col-md-12'><label class='labels'>Please Check Your Mobile</label><input type='number' name='otp_verify' class='form-control' placeholder='Enter OTP'></div><br>";
                                $otp_resend = '<div class="mt-2 text-center"><button class="btn btn-primary profile-button" name="otp_resend" value="Update">Resend OTP</button></div>';
                            } else {
                                if ($otp_verify == $mobile_otp) {
                                    $sql = "UPDATE users SET mobile_active='1', mobile='$mobile' WHERE email='$email'";
                                    $query = mysqli_query($conn, $sql);
                                    echo "<meta http-equiv=\"refresh\" content=\"0; url=profile.php\">";
                                } else {
                                    $otp_field = "<br><div class='col-md-12'><input type='number' name='otp_verify' class='form-control' placeholder='Invalid OTP'></div><br>";
                                }
                            }
                        } else {
                            $otp_field = "Invalid Mobile Number!";
                        }
                    }
                    ?>
                    <form action="profile.php" method="POST">
                        <?php
                        if ($active == 1) {
                            echo "<div class='col-md-12'><label class='labels'>E-mail ID - $email_active</label><input type='text' name='email' class='form-control' readonly='readonly' placeholder='Enter E-mail ID' value='$email'></div>";
                        } else {
                            echo "<div class='col-md-12'><label class='labels'>E-mail ID - $email_active</label><input type='text' name='email' class='form-control' placeholder='Enter E-mail ID' value='$email'></div>";
                        }
                        ?>
                        <br>
                        <?php
                        if ($mobile_count_active == 1) {
                            echo "<div class='col-md-12'><label class='labels'>Mobile - $mobile_active</label><input type='number' name='mobile' class='form-control' readonly='readonly' placeholder='Enter Mobile' value='$mobile_number'></div>";
                        } else {
                            echo "<div class='col-md-12'><label class='labels'>Mobile - $mobile_active</label><input type='number' name='mobile' class='form-control' placeholder='$mobile_number' value='$mobile'></div>";
                        }
                        echo $otp_field;
                        echo $otp_resend;
                        ?>
                        <div class="mt-2 text-center"><button class="btn btn-primary profile-button" name="otp" value="Update">Save</button></div>
                        <br>
                    </form>
                </div>
                <div class="col-md-5 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <form method="post" action="profile.php?email=<?php echo $email; ?>">
                            <div class="row mt-2">
                                <div class="col-md-12"><label class="labels">Name</label><input type="text" name="username" class="form-control" placeholder="Your name" value="<?php echo $user ?>"></div>
                            </div>
                            <div class="row mt-3">

                                <div class="col-md-12"><label class="labels">Postcode</label><input type="text" name="postalcode" class="form-control" placeholder="Postcode" value="<?php echo $postalcode ?>"></div>
                                <div class="col-md-12"><label class="labels">Education</label><input type="text" name="education" class="form-control" placeholder="Education" value="<?php echo $education ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Country</label><input type="text" name="country" class="form-control" placeholder="Country" value="<?php echo $country ?>"></div>
                                <div class="col-md-6"><label class="labels">State/Region</label><input type="text" name="state" class="form-control" value="<?php echo $state ?>" placeholder="State"></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="save_profile" value="Update">Save Profile</button></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center experience"><span>Edit Bio</span></div>
                        <div class="col-md-12"><label class="labels">Bio</label><textarea class="form-control" placeholder="Your Bio" name="bio"><?php echo $bio ?></textarea></div> <br>
                        <div class="col-md-12"><label class="labels">Additional Details</label><input type="text" class="form-control" name="additional" placeholder="Additional details" value="<?php echo $additional ?>"></div>
                        </form> <br>
                        <?php
                        $cover_upload = @$_POST['upload_cover'];
                        if ($cover_upload) {
                            if (((@$_FILES["img"]["type"] == "image/jpeg") || (@$_FILES["img"]["type"] == "image/png") || (@$_FILES["img"]["type"] == "image/gif")) && (@$_FILES["img"]["size"] < 10048576)) {
                                $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                                $rand_dir_name = substr(str_shuffle($chars), 0, 15);
                                mkdir("userdata/$rand_dir_name");
                                if (file_exists("userdata/$rand_dir_name/" . @$_FILES['img']['name'])) {
                                    $error = "Image Already Exists!";
                                } else {
                                    move_uploaded_file(@$_FILES['img']['tmp_name'], "userdata/$rand_dir_name/" . $_FILES['img']['name']);
                                    $cover_pic_name = "$rand_dir_name/" . @$_FILES['img']['name'];
                                    $sql = "UPDATE users SET profile_pic=? WHERE email=?";
                                    $stmt = mysqli_stmt_init($conn);
                                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                                        echo "Framework Error!";
                                    } else {
                                        mysqli_stmt_bind_param($stmt, "ss", $cover_pic_name, $email);
                                        mysqli_stmt_execute($stmt);
                                        echo "Uploaded!";
                                        exit("<meta http-equiv=\"refresh\" content=\"0\">");
                                    };
                                };
                            };
                        };
                        ?>

                        <div class="col-md-12">
                            <div class="d-flex justify-content-between align-items-center experience">
                                <form action='#' method='POST' enctype='multipart/form-data' style="display: inline;">
                                    <input type="file" name="img" id="upload" hidden /><label for="upload" class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Profile Picture</label>
                            </div><br>
                            <input class="btn btn-primary profile-button" type="submit" name="upload_cover" value="Upload" />
                        </div>
                        </form>
                        <?php
                        if (isset($_POST['delete_cover'])) {
                            $sql = "UPDATE `users` SET `profile_pic`=''";
                            $rt = mysqli_query($conn, $sql);
                            if ($rt) {
                                echo "Deleted!";
                                exit("<meta http-equiv=\"refresh\" content=\"0\">"); // redirects to all records page
                            } else {
                                echo "<h1> ERROR!</h1> " . $sql;
                            }
                        }
                        ?>
                        <form form method="POST" action="" enctype="multipart/form-data" style="display: inline;">
                            <div class="mt-2 col-md-6"><input class="btn btn-danger delete-button" type="submit" name="delete_cover" value="Delete Profile Picture" /></div>
                        </form>
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

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        $(function() {
            $("#resend_disable").attr("disabled", "disabled");
            setTimeout(function() {
                $("button").removeAttr("disabled");
            }, 10000);
        });
    </script>
    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</body>

</html>