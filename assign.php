<?php include('./components/header.php') ?>
<?php include('./includes/global.php'); ?>
<title>Assignment - GlowEdu</title>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row card card-body">
            <form action="" method="post" enctype="multipart/form-data">
                <table class="table table-striped table-responsive table-hover table-bordered">
                    <tr>
                        <td colspan="3">Select Students to Assign:</td>
                    </tr>
                    <th>Name</th>
                    <th>E-mail</th>
                    <th>Action</th>
                    <?php
                    $teacher_email = $_SESSION['email'];
                    $fetch_student_query = "SELECT * FROM teacher_data WHERE teacher_email = '$teacher_email'";
                    $result = mysqli_query($conn, $fetch_student_query);
                    while ($row = mysqli_fetch_array($result)) {
                        $teacher_id = $row['teacher_id'];
                        $fetch_student_query = "SELECT * FROM student_data WHERE teacher_id_ref = '$teacher_id'";
                        $result = mysqli_query($conn, $fetch_student_query);
                        while ($row = mysqli_fetch_array($result)) {
                            $student_email = $row['student_email'];
                            $student_name = $row['student_name'];
                            echo "<tr>
                        <td>$student_name</td>
                        <td>$student_email</td>
                        <td><input type='checkbox' name='techno[]' value='$student_email'></td>
                    </tr>";
                        }
                    }
                    ?><td colspan="3" align="center"><input type="submit" class="btn btn-outline-primary" value="submit" name="sub">
                </table>
            </form>
        </div>
    </div>
    <?php
    if (isset($_POST['sub'])) {
        $checkbox1 = $_POST['techno'];
        $teacher_email = $_SESSION['email'];
        $assignment_random_id = $_GET['id'];
        $created_at = date('Y-m-d');
        $chk = "";
        foreach ($checkbox1 as $chk1) {
            $chk .= $chk1 . ",";
        }
        $in_ch = mysqli_query($conn, "INSERT INTO `assigment_link`(`id`, `teacher_email`, `student_email`, `assignment_random_id`, `created_at`) VALUES 
                            (NULL,'$teacher_email','$chk','$assignment_random_id','$created_at')");
        if ($in_ch == 1) {
            echo "<script>
                    $(document).ready(function() {
                        swal('', 'Assigned Succesfully!!', 'success');
                    });</script>";
            echo "<meta http-equiv=\"refresh\" content=\"3; url=./assignment.php\">";
        } else {
            echo "<script>
            $(document).ready(function() {
                swal('', 'Error Assigning!!', 'danger');
            });</script>";
        }
    }
    ?>
    <?php include('./components/footer.php'); ?>
    <?php include('./components/scripts.php'); ?>