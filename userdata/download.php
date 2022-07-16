<?php include_once("database/phpmyadmin/connection.php"); ?>
<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/
// Database Connection
// get Users
$query = "SELECT * FROM users";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$users = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Users.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('No', 'Username', 'Email', 'Mobile', 'Hashed-Code', 'Bio', 'Date', 'Active', 'Token_key', 'State', 'Postalcode', 'Education', 'Country', 'Additional-Info', 'Picture-Code', 'User-Type'));

if (count($users) > 0) {
    foreach ($users as $row) {
        fputcsv($output, $row);
    }
}
?>