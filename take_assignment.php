<?php include('./components/header.php') ?>
<?php include('./includes/global.php'); ?>
<title>Profile || Glowedu</title>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card-body">
                    <?php
                    $assignment_code = $_GET['id'];
                    $answer = @$_GET['answer'];
                    $submit_answer = @$_GET['submit_answer'];
                    $main = @$_GET['main'];
                    $student_email = $_SESSION['email'];
                    $created_at = date('Y-m-d');
                    if ($submit_answer) {
                        $insert_select_question = "INSERT INTO `assignment_answer`(`answer_id`, `student_email`, `assignment_code`, `answer`, `student_answer`, `created_at`) VALUES 
                        (NULL,'$student_email','$assignment_code','$main','$answer','$created_at')";
                        $insert_select_query = mysqli_query($conn, $insert_select_question);
                        if ($insert_select_query) {
                            echo "<meta http-equiv=\"refresh\" content=\"5; url=take_assignment.php?id=$assignment_code\">";
                        }
                    }

                    $query_select_1 = "SELECT * FROM `assignment_serial_number` WHERE assignment_question_code = '$assignment_code'";
                    $query_select = mysqli_query($conn, $query_select_1);
                    $numberofrows = mysqli_num_rows($query_select);
                    $query_select_question = "SELECT * FROM assignment_serial_number WHERE assignment_question_code = '$assignment_code'";
                    $result_select_question = mysqli_query($conn, $query_select_question);
                    while ($row = mysqli_fetch_array($result_select_question)) {
                        $assignment_question_id = $row['assignment_question_id'];
                        $assignment_question_number = $row['assignment_question_number'];
                        $query_select_question = "SELECT * FROM mcq WHERE question_id = '$assignment_question_id'";
                        $result_select_question = mysqli_query($conn, $query_select_question);
                        while ($row = mysqli_fetch_array($result_select_question)) {
                            $question = $row['question'];
                            $first = $row['first'];
                            $second = $row['second'];
                            $third = $row['third'];
                            $fourth = $row['fourth'];
                            $answer = $row['answer'];
                            McqWidget($question, $first, $second, $third, $fourth, $answer, $assignment_code, $assignment_question_id);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

        <?php
        function McqWidget($question, $first, $second, $third, $fourth, $answer, $assignment_code)
        {
            echo "
                <div class='mb-3 card bg-white border'>
                <div class='card-header text-black font-size-lg'>$question</div>
                <div class='card-body'>
                    <form method='GET' action='./take_assignment.php'>
                        <div class='form-check form-check'>
                            <input class='form-check-input' type='radio' name='answer' id='inlineRadio1' value='$first'>
                            <label class='form-check-label font-size-lg' for='inlineRadio1'>$first</label>
                        </div>
                        <div class='form-check form-check'>
                            <input class='form-check-input' type='radio' name='answer' id='inlineRadio2' value='$second'>
                            <label class='form-check-label font-size-lg' for='inlineRadio2'>$second</label>
                        </div>
                        <div class='form-check form-check'>
                            <input class='form-check-input' type='radio' name='answer' id='inlineRadio3' value='$third'>
                            <label class='form-check-label font-size-lg' for='inlineRadio3'>$third</label>
                        </div>
                        <div class='form-check form-check'>
                            <input class='form-check-input' type='radio' name='answer' id='inlineRadio4' value='$fourth'>
                            <label class='form-check-label font-size-lg' for='inlineRadio4'>$fourth</label>
                        </div>
                        <input type='hidden' name='id' value='$assignment_code'>
                        <input type='hidden' name='id' value='$assignment_code'>
                        <input type='hidden' name='main' value='$answer'>
                        
                        <div class='row mt-3'>
                            <div class='col-md-10'></div>
                            <div class='col-md-2'>
                                <input type='submit' value='Submit Answer' name='submit_answer' class='col-md-12 btn btn-outline-primary'>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
                ";
        }
        ?>


        <?php include('./components/footer.php'); ?>
        <?php include('./components/scripts.php'); ?>