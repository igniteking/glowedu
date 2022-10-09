<?php
include('./includes/connection.php');
$final_email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email= $email";
$query = mysqli_query($conn, $sql);
$result = mysqli_num_rows($query);
if ($result == "0") {
    echo "Error 404";
} else {
    echo "Success";
    while ($row = mysqli_fetch_assoc($query)) {
        $response[] = $row;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}
