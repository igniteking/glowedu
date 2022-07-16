<?php
if (isset($_GET['vkey'])) {
    $vkey = $_GET['vkey'];
    $mysqli = new MySQLi('localhost', 'u391376576_root', 'Website@123', 'u391376576_IDE');
    $resultSet = $mysqli->query("SELECT active, token_key FROM users WHERE active='0' AND token_key='$vkey' LIMIT 1");
    if ($resultSet->num_rows == 1) {
        $update = $mysqli->query("UPDATE users SET active='1' WHERE token_key='$vkey' LIMIT 1");
        if ($update) {
            echo "Your account has been verified. You can now login. Redirecting...";
            echo "<meta http-equiv=\"refresh\" content=\"3; url=login.php\">";
        } else {
            echo $mysqli->error;
        }
    } else {
        echo "Your account has been verified. You can now login. Redirecting...";
            echo "<meta http-equiv=\"refresh\" content=\"3; url=login.php\">";
    }
} else {
    echo "Something Went Wrong!";
}
