<?php include('./components/header.php') ?>
<?php include('./includes/global.php'); ?>
<title>Dashboard | Glowedu</title>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <?php
                if (!@$_GET['id']) {
                    echo "<meta http-equiv=\"refresh\" content=\"0; url=./assignment.php\">";
                }
                ?>
                <?php if ($final_assignment_id = @$_GET['id']) {
                    $query_select_question = "SELECT * FROM mcq WHERE assignment_id = '$final_assignment_id'";
                    $result_select_question = mysqli_query($conn, $query_select_question);
                    while ($row = mysqli_fetch_array($result_select_question)) {
                        $question_id = $row['question_id'];
                        $question = $row['question'];
                        $answer = $row['answer'];
                        $first = $row['first'];
                        $second = $row['second'];
                        $third = $row['third'];
                        $fourth = $row['fourth'];
                        mcqWidget($question_id, $question, $answer, $first, $second, $third, $fourth);
                    }
                    $query_select_question = "SELECT * FROM short_question WHERE assignment_id = '$final_assignment_id'";
                    $result_select_question = mysqli_query($conn, $query_select_question);
                    while ($row = mysqli_fetch_array($result_select_question)) {
                        $question_id = $row['question_id'];
                        $question = $row['question'];
                        $answer = $row['answer'];
                        ShortQuestionWidget($question_id, $question, $answer);
                    }

                    $query_select_question = "SELECT * FROM long_question WHERE assignment_id = '$final_assignment_id'";
                    $result_select_question = mysqli_query($conn, $query_select_question);
                    while ($row = mysqli_fetch_array($result_select_question)) {
                        $question_id = $row['question_id'];
                        $question = $row['question'];
                        $answer = $row['answer'];
                        LongQuestionWidget($question_id, $question, $answer);
                    }
                }

                //echo $get_id = array_values(mysqli_fetch_array($conn->query("SELECT assignment_question_number FROM assignment_serial_number WHERE assignment_question_code='$final_assignment_id'")))[0];
                //CREATE NEW MCQ QUESTIONS
                if (@$_POST['create_mcq']) {
                    $question_id = @$_POST['question_id'];
                    $question = @$_POST['question'];
                    $answer = @$_POST['answer'];
                    $first = @$_POST['first'];
                    $second = @$_POST['second'];
                    $third = @$_POST['third'];
                    $fourth = @$_POST['fourth'];
                    $update_mcq = "UPDATE `mcq` SET `question`='$question', `answer`='$answer',`first`='$first',`second`='$second',`third`='$third',`fourth`='$fourth' WHERE question_id='$question_id'";
                    $mcq_result = mysqli_query($conn, $update_mcq);
                    if ($mcq_result) {
                        $assignment_id = $_GET['id'];
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                    }
                }
                //DELETE MCQ QUESTIONS
                $delete_mcq_id = @$_GET["delete_mcq"];
                if ($delete_mcq_id) {
                    $delete_mcq_quesry = "DELETE FROM `mcq` WHERE question_id = '$delete_mcq_id'";
                    $delete_mcq_response = mysqli_query($conn, $delete_mcq_quesry);
                    if ($delete_mcq_response) {
                        echo "Delete Question";
                        $assignment_id = $_GET['id'];
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                    } else {
                        "ERROR";
                    }
                }

                //CREATE NEW SHOT QUESTIONS
                if (@$_POST['create_short_question']) {
                    $question_id = @$_POST['question_id'];
                    $question = @$_POST['question'];
                    $answer = @$_POST['answer'];
                    $update_short_question = "UPDATE `short_question` SET `question`='$question', `answer`='$answer'WHERE question_id='$question_id'";
                    $short_question_result = mysqli_query($conn, $update_short_question);
                    if ($short_question_result) {
                        $assignment_id = $_GET['id'];
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                    }
                }
                //DELETE SHOT QUESTIONS
                $delete_short_question_id = @$_GET["delete_short_question"];
                if ($delete_short_question_id) {
                    $delete_short_quesry = "DELETE FROM `short_question` WHERE question_id = '$delete_short_question_id'";
                    $delete_short_response = mysqli_query($conn, $delete_short_quesry);
                    if ($delete_short_response) {
                        $assignment_id = $_GET['id'];
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                    } else {
                        "ERROR";
                    }
                }

                //CREATE NEW LONG QUESTIONS
                if (@$_POST['create_long_question']) {
                    $question_id = @$_POST['question_id'];
                    $question = @$_POST['question'];
                    $answer = @$_POST['answer'];
                    $update_short_question = "UPDATE `long_question` SET `question`='$question', `answer`='$answer'WHERE question_id='$question_id'";
                    $short_question_result = mysqli_query($conn, $update_short_question);
                    if ($short_question_result) {
                        $assignment_id = $_GET['id'];
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                    }
                }
                //DELETE LONG QUESTIONS
                $delete_long_question_id = @$_GET["delete_long_question"];
                if ($delete_long_question_id) {
                    $delete_long_quesry = "DELETE FROM `long_question` WHERE question_id = '$delete_long_question_id'";
                    $delete_long_response = mysqli_query($conn, $delete_long_quesry);
                    if ($delete_long_response) {
                        $assignment_id = $_GET['id'];
                        echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                    } else {
                        "ERROR";
                    }
                }

                ?>
                <?php if ($create_question = @$_POST['create_question']) {
                    $teacher_email = $_SESSION['email'];
                    if ($get_random_id = @$_GET['id']) {
                        $random_id = @$_GET['id'];
                    } else {
                        $random_id = rand();
                    }
                    $created_at = date("Y-m-d");
                    $question_type = @$_POST['question_type'];
                    if ($question_type == 'MCQ') {
                        $insert_question = "INSERT INTO `mcq`(`question_id`, `teacher_email`, `question`, `answer`, `assignment_id`, `created_at`) 
                                VALUES (NULL,'$teacher_email','','','$random_id','$created_at')";
                        $insertation_result = mysqli_query($conn, $insert_question);
                        $assignment_id = array_values(mysqli_fetch_array($conn->query("SELECT assignment_id FROM mcq WHERE assignment_id='$random_id'")))[0];

                        $query_select_question = "SELECT * FROM mcq WHERE assignment_id = '$final_assignment_id'";
                        $result_select_question = mysqli_query($conn, $query_select_question);
                        while ($row = mysqli_fetch_array($result_select_question)) {
                            $question_id = $row['question_id'];
                        }
                        $query_select_1 = "SELECT * FROM `assignment_serial_number` WHERE assignment_question_code = '$final_assignment_id'";
                        $query_select = mysqli_query($conn, $query_select_1);
                        $numberofrows = mysqli_num_rows($query_select);
                        $query_select_question = "SELECT * FROM assignment_serial_number WHERE assignment_question_code = '$final_assignment_id'";
                        $result_select_question = mysqli_query($conn, $query_select_question);
                        while ($row = mysqli_fetch_array($result_select_question)) {
                            echo $assignment_question_number = $row['assignment_question_number'];
                        }
                        if ($numberofrows == '0') {
                            $question_number == '1';
                        } else {
                            $question_number = ++$assignment_question_number;
                        }
                        $insert_assignment_serial_number = "INSERT INTO `assignment_serial_number`(`question_assignment_id`, `assignment_question_id`, `assignment_question_number`, `assignment_question_code`, `created_at`)
                        VALUES (NULL,'$question_id','$question_number','$random_id','$created_at')";
                        $insert_assignment_serial_number_results = mysqli_query($conn, $insert_assignment_serial_number);

                        if ($insert_assignment_serial_number_results) {
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                        }
                    } else if ($question_type == 'Short Answer') {
                        $insert_question = "INSERT INTO `short_question`(`question_id`, `teacher_email`, `question`, `answer`, `assignment_id`, `created_at`) 
                                VALUES (NULL,'$teacher_email','','','$random_id','$created_at')";
                        $insertation_result = mysqli_query($conn, $insert_question);
                        $assignment_id = array_values(mysqli_fetch_array($conn->query("SELECT assignment_id FROM short_question WHERE assignment_id='$random_id'")))[0];
                        $query_select_question = "SELECT * FROM short_question WHERE assignment_id = '$final_assignment_id'";
                        $result_select_question = mysqli_query($conn, $query_select_question);
                        while ($row = mysqli_fetch_array($result_select_question)) {
                            $question_id = $row['question_id'];
                        }
                        $query_select_1 = "SELECT * FROM `assignment_serial_number` WHERE assignment_question_code = '$final_assignment_id'";
                        $query_select = mysqli_query($conn, $query_select_1);
                        $numberofrows = mysqli_num_rows($query_select);
                        $query_select_question = "SELECT * FROM assignment_serial_number WHERE assignment_question_code = '$final_assignment_id'";
                        $result_select_question = mysqli_query($conn, $query_select_question);
                        while ($row = mysqli_fetch_array($result_select_question)) {
                            echo $assignment_question_number = $row['assignment_question_number'];
                        }
                        if ($numberofrows == '0') {
                            $question_number == '1';
                        } else {
                            $question_number = ++$assignment_question_number;
                        }
                        $insert_assignment_serial_number = "INSERT INTO `assignment_serial_number`(`question_assignment_id`, `assignment_question_id`, `assignment_question_number`, `assignment_question_code`, `created_at`)
                        VALUES (NULL,'$question_id','$question_number','$random_id','$created_at')";
                        $insert_assignment_serial_number_results = mysqli_query($conn, $insert_assignment_serial_number);

                        if ($insert_assignment_serial_number_results) {
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                        }
                    } else if ($question_type == 'Long Answer') {
                        $insert_question = "INSERT INTO `long_question`(`question_id`, `teacher_email`, `question`, `answer`, `assignment_id`, `created_at`) 
                                VALUES (NULL,'$teacher_email','','','$random_id','$created_at')";
                        $insertation_result = mysqli_query($conn, $insert_question);
                        $assignment_id = array_values(mysqli_fetch_array($conn->query("SELECT assignment_id FROM long_question WHERE assignment_id='$random_id'")))[0];
                        $query_select_question = "SELECT * FROM long_question WHERE assignment_id = '$final_assignment_id'";
                        $result_select_question = mysqli_query($conn, $query_select_question);
                        while ($row = mysqli_fetch_array($result_select_question)) {
                            $question_id = $row['question_id'];
                        }
                        $query_select_1 = "SELECT * FROM `assignment_serial_number` WHERE assignment_question_code = '$final_assignment_id'";
                        $query_select = mysqli_query($conn, $query_select_1);
                        $numberofrows = mysqli_num_rows($query_select);
                        $query_select_question = "SELECT * FROM assignment_serial_number WHERE assignment_question_code = '$final_assignment_id'";
                        $result_select_question = mysqli_query($conn, $query_select_question);
                        while ($row = mysqli_fetch_array($result_select_question)) {
                            echo $assignment_question_number = $row['assignment_question_number'];
                        }
                        if ($numberofrows == '0') {
                            $question_number == '1';
                        } else {
                            $question_number = ++$assignment_question_number;
                        }
                        $insert_assignment_serial_number = "INSERT INTO `assignment_serial_number`(`question_assignment_id`, `assignment_question_id`, `assignment_question_number`, `assignment_question_code`, `created_at`)
                        VALUES (NULL,'$question_id','$question_number','$random_id','$created_at')";
                        $insert_assignment_serial_number_results = mysqli_query($conn, $insert_assignment_serial_number);
                        if ($insert_assignment_serial_number_results) {
                            echo "<meta http-equiv=\"refresh\" content=\"0; url=create_new_assignment.php?id=$assignment_id\">";
                        }
                    }
                } ?>
                <?php
                if (isset($_POST['finish_assignment'])) {
                    echo "<meta http-equiv=\"refresh\" content=\"0; url=assignment.php\">";
                }
                if (@$_GET['id']) { ?>
                    <form action="" method="post">
                        <input type='submit' value='Submit Assignment' name="finish_assignment" class='mt-2 btn btn-outline-primary col-md-12'>
                    </form>
                    <br><br>
                <?php } ?>


                <form method='POST'>
                    <label class='label' for=''>Type Of Question</label>
                    <select name='question_type' class='form-control' id=''>
                        <option value='MCQ'>MCQ</option>
                        <option value='Short Answer'>Shot Answer</option>
                        <option value='Long Answer'>Long Answer</option>
                    </select>
                    <input type='submit' value='Create Question' name="create_question" class='mt-2 btn btn-primary col-md-2'>
                </form>
            </div>
        </div>
    </div>


    <?php function mcqWidget($question_id, $question, $answer, $first, $second, $third, $fourth)
    { ?>
        <form method="POST" class="mt-2 form-horizontal border border-primary">
            <div class="form-row card-body">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01">MCQ Question</label>
                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $question ?>" name="question" placeholder="Question" required />
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationCustom02">Answer</label>
                    <select name="answer" class="form-control" id="">
                        <option value="<?php echo $answer; ?>">Option <?php echo $answer; ?></option>
                        <option value="one">Option One</option>
                        <option value="two">Option Two</option>
                        <option value="three">Option Three</option>
                        <option value="four">Option Four</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom01">Option One</label>
                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $first ?>" name="first" placeholder="Option One" required />
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom02">Option Two</label>
                    <input type="text" class="form-control" id="validationCustom02" name="second" value="<?php echo $second ?>" placeholder="Option Two" required />
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom02">Option Three</label>
                    <input type="text" class="form-control" id="validationCustom02" name="third" value="<?php echo $third ?>" placeholder="Option Three" required />
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom02">Option Four</label>
                    <input type="text" class="form-control" id="validationCustom02" name="fourth" value="<?php echo $fourth ?>" placeholder="Option Four" required />
                    <input type="hidden" class="form-control" id="validationCustom02" name="question_id" value="<?php echo $question_id ?>" placeholder="Option Four" required />
                </div>
                <input type="submit" name="create_mcq" value="Create Question" class="btn btn-outline-primary" />
                <a href="./create_new_assignment.php?id=<?php echo $_GET['id'] ?>&delete_mcq=<?php echo $question_id ?>"><span class="btn btn-danger ml-1">Delete Question</span></a>
            </div>
        </form>
    <?php } ?>

    <?php function ShortQuestionWidget($question_id, $question, $answer)
    { ?>
        <form method="POST" class="mt-2 form-horizontal border border-primary">
            <div class="form-row card-body">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01">Short Question</label>
                    <textarea class="form-control" id="validationCustom01" name="question" placeholder="Question" required><?php echo $question; ?></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01">Short Answer</label>
                    <input type="hidden" class="form-control" id="validationCustom02" name="question_id" value="<?php echo $question_id ?>" placeholder="Option Four" required />
                    <input type="text" class="form-control" id="validationCustom01" value="<?php echo $answer; ?>" name="answer" placeholder="Short Answer" required />
                </div>
                <input type="submit" name="create_short_question" value="Create Question" class="btn btn-outline-primary" />
                <a href="./create_new_assignment.php?id=<?php echo $_GET['id'] ?>&delete_short_question=<?php echo $question_id ?>"><span class="btn btn-danger ml-1">Delete Question</span></a>
            </div>
        </form>
    <?php } ?>

    <?php function LongQuestionWidget($question_id, $question, $answer)
    { ?>
        <form method="POST" class="mt-2 form-horizontal border border-primary">
            <div class="form-row card-body">
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01">Long Question</label>
                    <textarea class="form-control" id="validationCustom01" name="question" placeholder="Question" required><?php echo $question; ?></textarea>
                </div>
                <div class="col-md-12 mb-3">
                    <label for="validationCustom01">Long Answer</label>
                    <input type="hidden" class="form-control" id="validationCustom02" name="question_id" value="<?php echo $question_id ?>" placeholder="Option Four" required />
                    <textarea class="form-control" id="validationCustom01" name="answer" placeholder="Long Answer" required><?php echo $answer; ?></textarea>
                </div>
                <input type="submit" name="create_long_question" value="Create Question" class="btn btn-outline-primary" />
                <a href="./create_new_assignment.php?id=<?php echo $_GET['id'] ?>&delete_long_question=<?php echo $question_id ?>"><span class="btn btn-danger ml-1">Delete Question</span></a>
            </div>
        </form>
    <?php } ?>
    <?php include('./components/footer.php'); ?>
    <?php include('./components/scripts.php'); ?>