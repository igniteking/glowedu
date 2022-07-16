<?php
if (isset($_SESSION['email'])) {

  $fetch_all_query = "SELECT * FROM user_data WHERE email = '" . $_SESSION['email'] . "'";
  $result = mysqli_query($conn, $fetch_all_query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $user_id = $rows['id'];
    $username = $rows['username'];
    $user_type = $rows['user_type'];
    $profile_pic = $rows['profile_picture'];
    $email = $rows['email'];
  }
}

if ($user_type == 'student') {
  $fetch_student_query = "SELECT * FROM student_data WHERE student_email = '" . $_SESSION['email'] . "'";
  $result = mysqli_query($conn, $fetch_student_query);

  while ($rows = mysqli_fetch_assoc($result)) {
    $student_id = $rows['student_id'];
    $teacher_id_ref = $rows['teacher_id_ref'];
  }
}
