<?php include('./components/header.php') ?>
<?php include('./includes/global.php'); ?>
<title>Profile || Glowedu</title>
<?php if ($user_type == 'teacher') { ?>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="row">
                <div class="col-md-5">
                    <div class="mb-3 card bg-white">
                        <div class="card-header">Create New Assignment</div>
                        <div class="card-body">
                            <?php
                            $submit = @$_POST['submit'];
                            if ($submit) {
                                $teacher_email = $_SESSION["email"];
                                $created_at = date("Y-m-d");
                                $assignment_name = @$_POST["assignment_name"];
                                $assignment_discription = @$_POST["assignment_discription"];
                                $random_id = rand();
                                $query = "INSERT INTO `assignment`(`assignment_id`, `teacher_email`, `assignment_name`, `assignment_discription`, `assignment_code`, `created_at`)
                            VALUES (NULL,'$teacher_email', '$assignment_name', '$assignment_discription', '$random_id','$created_at')";
                                $result = mysqli_query($conn, $query);
                                if ($result) {
                                    echo "<script>
                                $(document).ready(function() {
                                    swal('', 'Created Succesfully!!', 'success');
                                });</script>";
                                    echo "<meta http-equiv=\"refresh\" content=\"3; url=create_new_assignment.php?id=$random_id\">";
                                }
                            } ?>
                            <form method="post">
                                <div class="form-row">
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustom01">Assignment Name</label>
                                        <input type="text" class="form-control" id="validationCustom01" name="assignment_name" placeholder="Name of the Assignment" required />
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="validationCustomUsername">Assignment Discription</label>
                                        <div class="input-group">
                                            <textarea type="text" rows="3" class="form-control" id="validationCustomUsername" name="assignment_discription" placeholder="Discription" aria-describedby="inputGroupPrepend" required></textarea>
                                        </div>
                                    </div>
                                    <div class="card-footer col-md-12">
                                        <input type="submit" value="Create Assignment" name="submit" class="col-md-12 btn btn-outline-primary">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-body">
                        <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Your Assignments</h6>
                        <div class="scroll-area-md">
                            <div class="scrollbar-container">
                                <?php
                                //DELETE ASSIGNMENT
                                $delete_assignment = @$_GET["delete_id"];
                                if ($delete_assignment) {
                                    $delete_assignment_quesry = "DELETE FROM `assignment` WHERE assignment_id = '$delete_assignment'";
                                    $delete_assignment_response = mysqli_query($conn, $delete_assignment_quesry);
                                    if ($delete_assignment_response) {
                                        echo "<meta http-equiv=\"refresh\" content=\"0; url=./assignment.php\">";
                                    } else {
                                        "ERROR";
                                    }
                                }

                                $teacher_email = $_SESSION["email"];
                                $query_select_question = "SELECT * FROM assignment WHERE teacher_email = '$teacher_email'";
                                $result_select_question = mysqli_query($conn, $query_select_question);
                                while ($row = mysqli_fetch_array($result_select_question)) {
                                    $assignment_id = $row['assignment_id'];
                                    $assignment_name = $row['assignment_name'];
                                    $assignment_discription = $row['assignment_discription'];
                                    $assignment_code = $row['assignment_code'];
                                    echo "<div class='mb-3 card bg-white border border-primary'>
                                    <div class='card-header text-black'>$assignment_name</div>
                                    <div class='card-body'>$assignment_discription</div>
                                    <div class='card-footer'>"; ?>
                                    <a href="./assign.php?id=<?php echo $assignment_code ?>"><span class="btn btn-primary ml-1">Assign</span></a>
                                    <a href="./create_new_assignment.php?id=<?php echo $assignment_code ?>"><span class="btn btn-secondary ml-1">Edit</span></a>
                                    <a href="./assignment.php?delete_id=<?php echo $assignment_id ?>"><span class="btn btn-danger ml-1">Delete</span></a>
                                <?php echo "
                                    </div>
                                </div>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else if ($user_type == 'student') { ?>
        <div class="app-main__outer">
            <div class="app-main__inner">
                <div class="row">
                    <div class="col-md-7">
                        <div class="card card-body">
                            <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">Your Assignments</h6>
                            <div class="scroll-area-md">
                                <div class="scrollbar-container">
                                    <?php
                                    $query_select_question = "SELECT * FROM teacher_data WHERE teacher_id = '$teacher_id_ref'";
                                    $result_select_question = mysqli_query($conn, $query_select_question);
                                    while ($row = mysqli_fetch_array($result_select_question)) {
                                        $teacher_email = $row['teacher_email'];

                                        $query_select_question = "SELECT * FROM assigment_link WHERE teacher_email = '$teacher_email'";
                                        $result_select_question = mysqli_query($conn, $query_select_question);
                                        while ($row = mysqli_fetch_array($result_select_question)) {
                                            $assignment_random_id = $row['assignment_random_id'];
                                            $student_email = $row['student_email'];
                                            $str_arr = explode(",", $student_email);
                                            foreach ($str_arr as $key => $value) {
                                                if ($value == $_SESSION['email']) {
                                                    $query_select_question = "SELECT * FROM assignment WHERE teacher_email = '$teacher_email'";
                                                    $result_select_question = mysqli_query($conn, $query_select_question);
                                                    while ($row = mysqli_fetch_array($result_select_question)) {
                                                        $assignment_id = $row['assignment_id'];
                                                        $assignment_name = $row['assignment_name'];
                                                        $assignment_discription = $row['assignment_discription'];
                                                        $assignment_code = $row['assignment_code'];
                                                        echo "<div class='mb-3 card bg-white border border-primary'>
                                                    <div class='card-header text-black'>$assignment_name</div>
                                                    <div class='card-body'>$assignment_discription</div>
                                                    <div class='card-footer'>"; ?>
                                                        <a href="./take_assignment.php?id=<?php echo $assignment_code ?>"><span class="btn btn-primary ml-1">Take</span></a>
                                    <?php echo "</div></div>";
                                                    }
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <?php include('./components/footer.php'); ?>
        <?php include('./components/scripts.php'); ?>