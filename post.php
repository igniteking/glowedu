<?php include('./components/header.php') ?>
<?php include('./includes/global.php'); ?>
<title>Dashboard | Glowedu</title>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <a href="group_dis.php"><i style="font-size: 22px; float: left;" class="pe-7s-angle-left"></i>Go back</a><br><br>
                        <?php
                        $postid = $_GET["post_id"];
                        $submit = @$_POST['submit'];
                        $reply_content = strip_tags(@$_POST['reply_content']);
                        $reply_user_id = $user_id;
                        $reply_post_id = $postid;
                        $created_at = date("Y/m/d");
                        if ($submit) {
                            if ($reply_content && $reply_user_id) {
                                // // UPLOADING PROFILE PIC
                                // $length = 10;
                                // $random = substr(str_shuffle(str_repeat($x = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length / strlen($x)))), 1, $length);
                                // $folder = mkdir("addons/data/$random");
                                // $target_dir = "addons/data/$random/";
                                // $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
                                // $uploadOk = 1;
                                // $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                                // if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
                                //     $profile_picture = htmlspecialchars(basename($_FILES["profile_picture"]["name"]));
                                // } else {
                                //     echo "Sorry, there was an error uploading your file.";
                                // }


                                $insert_post = "INSERT INTO `post_reply`(`reply_id`, `reply_content`,`reply_user_id`, `reply_post_id`, `created_at`) VALUES 
                                  (NULL,'$reply_content','$reply_user_id', '$reply_post_id', '$created_at')";
                                $query_insertation_result = mysqli_query($conn, $insert_post);
                                if ($query_insertation_result) {
                                    echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #b7e4c7"><h6 style="text-align: center; color: #000; margin: 5px;">Posted Successfully!</h6></div><br><br>';
                                    echo "<meta http-equiv=\"refresh\" content=\"2; url=post.php?post_id=$postid\">";
                                } else {
                                    echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Error Posted Record!</h6></div><br><br>';
                                    echo "<meta http-equiv=\"refresh\" content=\"3; url=post.php?post_id=$postid\">";
                                }
                            } else {
                                echo '<div class="col-12 p-1" style="border-radius: 5px; background-color: #f94144"><h6 style="text-align: center; color: #fff; margin: 5px;">Empty Posted can not be Inserted!</h6></div><br><br>';
                                echo "<meta http-equiv=\"refresh\" content=\"3; url=post.php?post_id=$postid\">";
                            }
                        }
                        ?>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <?php
                                $query = "SELECT * FROM group_dis WHERE post_id = '$postid'";
                                $result = mysqli_query($conn, $query);
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $post_id = $rows['post_id'];
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
                                        } ?>
                                        <h5 class="card-title"><?php echo $post_content ?></h5><?php if (!empty($post_pic)) { echo "Click on the image to see in full screen<br><a href='./$post_picture;' target="_blank"><img width="400px" src="./<?php echo $post_picture; ?>"></a><br><br>";
                                        <h5 class="card-subtitle">Posted By: <?php echo $username ?> || Posted On: <?php echo $created_at ?></h5>
                                        <div id="exampleAccordion" data-children=".item">
                                    <?php
                                        $query = "SELECT * FROM post_reply WHERE reply_post_id = '$postid'";
                                        $result = mysqli_query($conn, $query);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $reply_id = $rows['reply_id'];
                                            $reply_content = $rows['reply_content'];
                                            $reply_user_id = $rows['reply_user_id'];
                                            $reply_post_id = $rows['reply_post_id'];
                                            $created_at = $rows['created_at'];

                                            $query2 = "SELECT * FROM users WHERE id = '$reply_user_id'";
                                            $result2 = mysqli_query($conn, $query2);
                                            $rowcount = mysqli_num_rows($result2);
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
                                                @$num++;
                                                $base = "exampleAccordion" . $num++;
                                                $base2 = "collapseExample" . $num;

                                                echo "<div class='item'>
                                            <button type='button' aria-expanded='true' aria-controls='$base' data-toggle='collapse' href='#$base2' class='m-0 p-0 btn btn-link'>$username</button>
                                            <div data-parent='#exampleAccordion' id='$base2' class='collapse'>
                                                <p class='mb-3'>$reply_content</p>
                                            </div>
                                        </div>";
                                            }
                                        }
                                    }
                                } ?>
                                </div>
                            </div>
                        </div>
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <form method="post" action="post.php?post_id=<?php echo $postid ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                                    <div class="form-row">
                                        <div class="col-11">
                                            <div class="input-group">
                                                <textarea type="text" class="form-control" id="validationCustomUsername" name="reply_content" placeholder="Reply to <?php echo $username ?>..." aria-describedby="inputGroupPrepend" required></textarea>
                                                <div class="invalid-feedback">
                                                    Please Fill this feils.
                                                </div>
                                            </div>
                                        </div>
                                        <input class="btn btn-primary text-white" name="submit" type="submit" value="Reply This!"></button>
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