<?php include_once("database/phpmyadmin/connection.php"); ?>

<?php

$user_id = $_GET['id']; // get id through query string
$query = "DELETE FROM `users` WHERE `id` = '$user_id'";
$del = mysqli_query($conn, $query); // delete query
if($del)
{
    mysqli_close($conn); // Close connection
    echo "deleted record"; // display error message if not delete
    header("location:user.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>