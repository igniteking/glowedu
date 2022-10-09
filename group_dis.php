<?php include('./components/header.php') ?>
<?php include('./includes/global.php'); ?>
<title>Dashboard | Glowedu</title>
<div class="app-main__outer">
    <div class="app-main__inner">
        <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-0" data-toggle="tab" href="#tab-content-0">
                    <span>University Topics</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link" id="tab-1" data-toggle="tab" href="#tab-content-1">
                    <span>General Topics</span>
                </a>
            </li>
            <li class="nav-item">
                <a role="tab" class="nav-link active" id="tab-2" data-toggle="tab" href="#tab-content-2">
                    <span>Personal Replies</span>
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <?php
                        $submit = @$_POST['submit'];
                        $post_content = strip_tags(@$_POST['post_content']);
                        $post_user_id = $user_id;
                        $post_picture = strip_tags(@$_POST['post_picture']);
                        $created_at = date("Y/m/d");
                        if ($submit) {
                            if ($post_content && $post_user_id) {
                                // UPLOADING PROFILE PIC
                                $length = 10;
                                $random = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                                $folder = mkdir("addons/post/$random");
                                $target_dir = "addons/post/$random/";
                                $target_file = $target_dir . basename($_FILES["post_picture"]["name"]);
                                $uploadOk = 1;
                                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                if (move_uploaded_file($_FILES["post_picture"]["tmp_name"], $target_file)) {
                                    $post_picture = htmlspecialchars(basename($_FILES["post_picture"]["name"]));
                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }


                                $insert_post = "INSERT INTO `group_dis`(`post_id`, `post_content`,`post_user_id`, `post_picture`, `created_at`) VALUES 
                                  (NULL,'$post_content','$post_user_id', '$target_dir$post_picture', '$created_at')";
                                $query_insertation_result = mysqli_query($conn, $insert_post);
                                if ($query_insertation_result) {
                                    echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #b7e4c7"><h6 style="text-align: center; color: #000; margin: 5px;">Posted Successfully!</h6></div><br><br>';
                                    echo "<meta http-equiv=\"refresh\" content=\"2; url=group_dis.php\">";
                                } else {
                                    echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Error Posted Record!</h6></div><br><br>';
                                    echo "<meta http-equiv=\"refresh\" content=\"3; url=group_dis.php\">";
                                }
                            } else {
                                echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Empty Posted can not be Inserted!</h6></div><br><br>';
                                echo "<meta http-equiv=\"refresh\" content=\"3; url=group_dis.php\">";
                            }
                        }
                        ?>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form method="post" action="group_dis.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-11">
                                            <div class="input-group">
                                                <input type="file" class="form-control" name="post_picture">
                                            </div>
                                            <div class="input-group">
                                                <textarea type="text" class="form-control" id="validationCustomUsername" name="post_content" placeholder="What's on your mind?" aria-describedby="inputGroupPrepend" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please Fill this feils.
                                                </div>
                                            </div>
                                        </div>
                                        <input class="btn btn-primary text-white" name="submit" type="submit" value="Post This!"></button>
                                    </div>
                                </form>

                                <script>
                                    // Example starter JavaScript for disabling form submissions if there are invalid fields
                                    (function() {
                                        "use strict";
                                        window.addEventListener(
                                            "load",
                                            function() {
                                                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                var forms =
                                                    document.getElementsByClassName("needs-validation");
                                                // Loop over them and prevent submission
                                                var validation = Array.prototype.filter.call(
                                                    forms,
                                                    function(form) {
                                                        form.addEventListener(
                                                            "submit",
                                                            function(event) {
                                                                if (form.checkValidity() === false) {
                                                                    event.preventDefault();
                                                                    event.stopPropagation();
                                                                }
                                                                form.classList.add("was-validated");
                                                            },
                                                            false
                                                        );
                                                    }
                                                );
                                            },
                                            false
                                        );
                                    })();
                                </script>
                            </div>
                        </div>
                        <div class="main-card card">
                            <div class="card-body">
                                <?php
                                $query1 = "SELECT * FROM student_data WHERE student_email = '" . $_SESSION['email'] . "'";
                                $result1 = mysqli_query($conn, $query1);
                                while ($rows = mysqli_fetch_assoc($result1)) {
                                    $teacher_id_ref = $rows['teacher_id_ref'];
                                    $query = "SELECT * FROM group_dis WHERE post_user_id = $teacher_id_ref";
                                    $result = mysqli_query($conn, $query);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $postid = $rows['post_id'];
                                        $post_content = $rows['post_content'];
                                        $post_user_id = $rows['post_user_id'];
                                        $post_picture = $rows['post_picture'];
                                        $created_at = $rows['created_at'];

                                        $query2 = "SELECT * FROM user_data WHERE id = '$post_user_id'";
                                        $result2 = mysqli_query($conn, $query2);
                                        while ($rows = mysqli_fetch_assoc($result2)) {
                                            $userid = $rows['id'];
                                            $username = $rows['username'];
                                            $user_type = $rows['user_type'];
                                            $email = $rows['email'];
                                            if (empty($rows['profile_pic'])) {
                                                $profile_pic = './assets/images/avatars/avatar.png';
                                            } else {
                                                $profile_pic = "./userdata/" . $rows['profile_pic'];
                                            }
                                            echo "<div class='card-shadow-primary border mb-3 card-body border-primary'>
                                        <div class='row'>
                                            <div class='col-6 d-md-none'>
                                                <span class='text-bold'><strong>$username</strong></span>
                                            </div>
                                            <div class='col-2 d-none d-md-block'>
                                                <center><img class='img rounded-circle' width='50' src='$profile_pic' alt=''><span class='d-none d-md-block'>$username</span></center>
                                            </div>
                                            <div class='col-9'>
                                                <span class='text-muted'>$post_content</span>
                                                ";
                                            if (!empty($post_picture)) {
                                                echo "<br><strong>Image Included in the post!</strong>";
                                            }
                                            echo "
                                            </div>
                                            <div class='col-1 d-none d-sm-block'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                            <div class='col-10 mt-4 d-block d-sm-none'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                    }
                                }
                                ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane tabs-animation fade" id="tab-content-1" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <?php
                                $submit = @$_POST['submit'];
                                $post_content = strip_tags(@$_POST['post_content']);
                                $post_user_id = $user_id;
                                $post_picture = strip_tags(@$_POST['post_picture']);
                                $created_at = date("Y/m/d");
                                if ($submit) {
                                    if ($post_content && $post_user_id) {
                                        // UPLOADING PROFILE PIC
                                        $length = 10;
                                        $random = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                                        $folder = mkdir("addons/post/$random");
                                        $target_dir = "addons/post/$random/";
                                        $target_file = $target_dir . basename($_FILES["post_picture"]["name"]);
                                        $uploadOk = 1;
                                        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                        if (move_uploaded_file($_FILES["post_picture"]["tmp_name"], $target_file)) {
                                            $post_picture = htmlspecialchars(basename($_FILES["post_picture"]["name"]));
                                        } else {
                                            echo "Sorry, there was an error uploading your file.";
                                        }


                                        $insert_post = "INSERT INTO `group_dis`(`post_id`, `post_content`,`post_user_id`, `post_picture`, `created_at`) VALUES 
                                  (NULL,'$post_content','$post_user_id', '$target_dir$post_picture', '$created_at')";
                                        $query_insertation_result = mysqli_query($conn, $insert_post);
                                        if ($query_insertation_result) {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #b7e4c7"><h6 style="text-align: center; color: #000; margin: 5px;">Posted Successfully!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"2; url=group_dis.php\">";
                                        } else {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Error Posted Record!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"3; url=group_dis.php\">";
                                        }
                                    } else {
                                        echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Empty Posted can not be Inserted!</h6></div><br><br>';
                                        echo "<meta http-equiv=\"refresh\" content=\"3; url=group_dis.php\">";
                                    }
                                }
                                ?>
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <form method="post" action="group_dis.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                                            <div class="form-row">
                                                <div class="col-11">
                                                    <div class="input-group">
                                                        <input type="file" class="form-control" name="post_picture">
                                                    </div>
                                                    <div class="input-group">
                                                        <textarea type="text" class="form-control" id="validationCustomUsername" name="post_content" placeholder="What's on your mind?" aria-describedby="inputGroupPrepend" required></textarea>
                                                        <div class="invalid-feedback">
                                                            Please Fill this feils.
                                                        </div>
                                                    </div>
                                                </div>
                                                <input class="btn btn-primary text-white" name="submit" type="submit" value="Post This!"></button>
                                            </div>
                                        </form>

                                        <script>
                                            // Example starter JavaScript for disabling form submissions if there are invalid fields
                                            (function() {
                                                "use strict";
                                                window.addEventListener(
                                                    "load",
                                                    function() {
                                                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                        var forms =
                                                            document.getElementsByClassName("needs-validation");
                                                        // Loop over them and prevent submission
                                                        var validation = Array.prototype.filter.call(
                                                            forms,
                                                            function(form) {
                                                                form.addEventListener(
                                                                    "submit",
                                                                    function(event) {
                                                                        if (form.checkValidity() === false) {
                                                                            event.preventDefault();
                                                                            event.stopPropagation();
                                                                        }
                                                                        form.classList.add("was-validated");
                                                                    },
                                                                    false
                                                                );
                                                            }
                                                        );
                                                    },
                                                    false
                                                );
                                            })();
                                        </script>
                                    </div>
                                </div>
                                <div class="main-card card">
                                    <div class="card-body">
                                        <?php
                                        $query = "SELECT * FROM group_dis";
                                        $result = mysqli_query($conn, $query);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $postid = $rows['post_id'];
                                            $post_content = $rows['post_content'];
                                            $post_user_id = $rows['post_user_id'];
                                            $post_picture = $rows['post_picture'];
                                            $created_at = $rows['created_at'];

                                            $query2 = "SELECT * FROM users WHERE id = '$post_user_id'";
                                            $result2 = mysqli_query($conn, $query2);
                                            while ($rows = mysqli_fetch_assoc($result2)) {
                                                $user_id = $rows['id'];
                                                $username = $rows['username'];
                                                $user_type = $rows['user_type'];
                                                $email = $rows['email'];
                                                if (empty($rows['profile_pic'])) {
                                                    $profile_pic = './assets/images/avatars/avatar.png';
                                                } else {
                                                    $profile_pic = "./userdata/" . $rows['profile_pic'];
                                                }
                                                echo "<div class='card-shadow-primary border mb-3 card-body border-primary'>
                                        <div class='row'>
                                            <div class='col-6 d-md-none'>
                                                <span class='text-bold'><strong>$username</strong></span>
                                            </div>
                                            <div class='col-2 d-none d-md-block'>
                                                <center><img class='img rounded-circle' width='50' src='$profile_pic' alt=''><span class='d-none d-md-block'>$username</span></center>
                                            </div>
                                            <div class='col-9'>
                                                <span class='text-muted'>$post_content</span>
                                                ";
                                                if (!empty($post_picture)) {
                                                    echo "<br><strong>Image Included in the post!</strong>";
                                                }
                                                echo "
                                            </div>
                                            <div class='col-1 d-none d-sm-block'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                            <div class='col-10 mt-4 d-block d-sm-none'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                        </div>
                                    </div>";
                                            }
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane tabs-animation fade" id="tab-content-2" role="tabpanel">
                <div class="row">
                    <div class="col-12">
                        <div class="main-card card">
                            <div class="main-card card">
                                <div class="card-body">
                                    <?php
                                    $query2 = "SELECT * FROM student_data WHERE student_email = '" . $_SESSION['email'] . "'";
                                    $result2 = mysqli_query($conn, $query2);
                                    while ($rows = mysqli_fetch_assoc($result2)) {
                                        $teacher_id_ref = $rows['teacher_id_ref'];
                                        $query = "SELECT * FROM private_reply WHERE private_reply_teacher = $teacher_id_ref";
                                        $result = mysqli_query($conn, $query);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            echo $message = $rows['message'];
                                            $private_reply_student = $rows['private_reply_student'];
                                            $created_at = $rows['created_at'];

                                            $query3 = "SELECT * FROM student_data WHERE student_id = '$private_reply_student'";
                                            $result3 = mysqli_query($conn, $query3);
                                            while ($rows = mysqli_fetch_assoc($result3)) {
                                                $student_name = $rows['student_name'];
                                                $email = $rows['student_email'];
                                                if (empty($rows['profile_pic'])) {
                                                    $profile_pic = './assets/images/avatars/avatar.png';
                                                } else {
                                                    $profile_pic = "./userdata/" . $rows['profile_pic'];
                                                }
                                                echo "<div class='card-shadow-primary border mb-3 card-body border-primary'>
                                        <div class='row'>
                                            <div class='col-6 d-md-none'>
                                                <span class='text-bold'><strong>$student_name</strong></span>
                                            </div>
                                            <div class='col-2 d-none d-md-block'>
                                                <center><img class='img rounded-circle' width='50' src='$profile_pic' alt=''><span class='d-none d-md-block'>$username</span></center>
                                            </div>
                                            <div class='col-9'>
                                                <span class='text-muted'>$message</span>
                                            </div>
                                        </div>
                                    </div>";
                                            }
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                            <?php
                            $send = @$_POST['send'];
                            $post_content = strip_tags(@$_POST['post_content']);
                            $created_at = date("Y/m/d");
                            if ($send) {
                                if ($post_content && $post_user_id) {
                                    $query2 = "SELECT * FROM student_data WHERE student_email = '" . $_SESSION['email'] . "'";
                                    $result2 = mysqli_query($conn, $query2);
                                    while ($rows = mysqli_fetch_assoc($result2)) {
                                        $private_reply_student =  $rows['student_id'];
                                        $teacher_id_ref = $rows['teacher_id_ref'];
                                        $insert_post = "INSERT INTO `private_reply`(`private_reply_id`, `private_reply_teacher`, `private_reply_student`, `message`, `created_at`) VALUES
                                     (NULL,'$teacher_id_ref','$private_reply_student','$post_content','$created_at')";
                                        $query_insertation_result = mysqli_query($conn, $insert_post);
                                        if ($query_insertation_result) {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #b7e4c7"><h6 style="text-align: center; color: #000; margin: 5px;">Posted Successfully!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"2; url=group_dis.php\">";
                                        } else {
                                            echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Error Posted Record!</h6></div><br><br>';
                                            echo "<meta http-equiv=\"refresh\" content=\"3; url=group_dis.php\">";
                                        }
                                    }
                                } else {
                                    echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Empty Posted can not be Inserted!</h6></div><br><br>';
                                    echo "<meta http-equiv=\"refresh\" content=\"3; url=group_dis.php\">";
                                }
                            }
                            ?>
                            <div class="main-card mb-3 card">
                                <div class="card-body">
                                    <form method="post" action="group_dis.php" enctype="multipart/form-data" class="needs-validation" novalidate>
                                        <div class="form-row">
                                            <div class="col-11">
                                                <div class="input-group">
                                                    <textarea type="text" class="form-control" id="validationCustomUsername" name="post_content" placeholder="What's on your mind?" aria-describedby="inputGroupPrepend" required></textarea>
                                                    <div class="invalid-feedback">
                                                        Please Fill this feils.
                                                    </div>
                                                </div>
                                            </div>
                                            <input class="btn btn-primary text-white" name="send" type="submit" value="Post This!"></button>
                                        </div>
                                    </form>

                                    <script>
                                        // Example starter JavaScript for disabling form submissions if there are invalid fields
                                        (function() {
                                            "use strict";
                                            window.addEventListener(
                                                "load",
                                                function() {
                                                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                                                    var forms =
                                                        document.getElementsByClassName("needs-validation");
                                                    // Loop over them and prevent submission
                                                    var validation = Array.prototype.filter.call(
                                                        forms,
                                                        function(form) {
                                                            form.addEventListener(
                                                                "submit",
                                                                function(event) {
                                                                    if (form.checkValidity() === false) {
                                                                        event.preventDefault();
                                                                        event.stopPropagation();
                                                                    }
                                                                    form.classList.add("was-validated");
                                                                },
                                                                false
                                                            );
                                                        }
                                                    );
                                                },
                                                false
                                            );
                                        })();
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./components/footer.php'); ?>
    <?php include('./components/scripts.php'); ?>