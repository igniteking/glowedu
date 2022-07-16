<?php include('./includes/connection.php'); ?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
    <div id="content" class="form-row"></div>
    <input name="test" type="submit">
</form>
<button class="btn btn-light col-md-12" onclick="add_fields()">Add More</button>
<?php
$test = @$_POST['test'];
$additional_title = (@$_POST['additional_title']);
$additional_contetn = (@$_POST['additional_content']);
foreach ($additional_title as $row) {
    @$additional_title .= $row . ",";
}
foreach ($additional_contetn as $row) {
    @$additional_contetn .= $row . ",";
}
$additional_title = substr($additional_title, 5, -1);
$additional_contetn = substr($additional_contetn, 5, -1);
if ($test) {
    $query = "UPDATE `resume_data` SET `additional_title`='$additional_title' , `additional_content`='$additional_contetn' WHERE `resume_id` = '1'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo "UPDATED!";
    }
} ?>
<script>
    function add_fields() {
        var d = document.getElementById("content");

        d.innerHTML += "<div class='col-md-6 mb-3'><label for='validationCustom05'>Additional Information Title</label><input type='text' class='form-control' id='validationCustomUsername' name='additional_title[]' placeholder='Additional Information Title' aria-describedby='inputGroupPrepend' required></div><div class='col-md-6 mb-3'><label for='validationCustom05'>Additional Information Content</label><textarea type='text' class='form-control' id='validationCustomUsername' name='additional_content[]' placeholder='Additional Information Content' aria-describedby='inputGroupPrepend' required></textarea></div>";
    }
</script>


<?php
$query = "SELECT * FROM resume_data WHERE resume_id = '1'";
$result = mysqli_query($conn, $query);
while ($rows = mysqli_fetch_assoc($result)) {
    $additional_title = ($rows['additional_title']);
    $additional_title =  (explode(',', $additional_title));
    foreach ($additional_title as $additional_title) {
        echo "<h1>" . $additional_title . "</h1><br>";
    }
    $additional_content = ($rows['additional_content']);
    $additional_content =  (explode(',', $additional_content));
    foreach ($additional_content as $additional_content) {
        echo "<h1>" . $additional_content . "</h1><br>";
    }
}



?>