<?php
include('../includes/connection.php');
$user_id = $_GET['user_id'];
$fetch_all_query = "SELECT * FROM resume_data WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $fetch_all_query);

while ($rows = mysqli_fetch_assoc($result)) {
    $first_name = $rows['first_name'];
    $last_name = $rows['last_name'];
    $about = $rows['about'];
    $email = $rows['email'];
    $education_title = $rows['education_title'];
    $education_year = $rows['education_year'];
    $education_from = $rows['education_from'];
    $education_title2 = $rows['education_title2'];
    $education_year2 = $rows['education_year2'];
    $education_from2 = $rows['education_from2'];
    $award = $rows['award'];
    $award_for = $rows['award_for'];
    $award_date = $rows['award_date'];
    $award2 = $rows['award2'];
    $award_date2 = $rows['award_date2'];
    $award_for2 = $rows['award_for2'];
    $mobile = $rows['mobile'];
    $address = $rows['address'];
    $work_experience = $rows['work_experience'];
    $address = $rows['address'];
    $profile_pic = $rows['profile_picture'];
    $additional_title = $rows['additional_title'];
}
?>
<link rel="stylesheet" href="../main.css">
<div style="background-color: #e5e5e5; padding: 10px;">
    <div class="row m-4">
        <div class="col-6 p-4" style="background-color: white;">
            <div style="background-color: #e5e5e5; border-radius: 5px; padding: 30px;">
                <center><img class="img-responsive" style="border-radius: 10px; width: 150px;" src="../<?php echo $profile_pic; ?>" alt=""><br>
            </div>
            <center>
                <h3 style="text-transform: capitalize;" class="text-black mt-2 ml-4"><?php echo $first_name . ' ' . $last_name; ?></h3><br>
            </center>
            <p><?php echo $about; ?></p>
            <div class="col-9 bg-dark">
                <div class="card-title text-white">
                    <h2>Education</h2>
                </div>
            </div><br>
            <h5><?php echo $education_year . " | " . " | " . $education_title; ?></h5>
            <b>
                <h5 style="font-weight: 600;"><?php echo $education_title ?></h5>
            </b><br>
            <h5><?php echo $education_year2 . " | " . " | " . $education_title2; ?></h5>
            <b>
                <h5 style="font-weight: 600;"><?php echo $education_title2 ?></h5>
            </b><br>
            <div class="col-9 bg-dark">
                <div class="card-title text-white">
                    <h2>Contact</h2>
                </div>
            </div><br>
            <h5><i class="fa fa-phone mr-2"></i> <?php echo $mobile; ?></h5>
            <h5><i class="fa fa-envelope mr-2"></i> <?php echo $email; ?></h5>
            <h5><i class="fa fa-map-marker mr-2"></i> <?php echo $address; ?></h5>
        </div>
        <div class="col-6">
            <div class="col-12 bg-dark">
                <div class="card-title text-white">
                    <h2>Work Experience</h2>
                </div>
            </div><br>
            <h5><?php echo $work_experience; ?></h5><br>
            <div class="col-12 bg-dark">
                <div class="card-title text-white">
                    <h2>Award</h2>
                </div>
            </div><br>
            <h5><?php echo $award_date . " | " . " | " . $award_for; ?></h5>
            <b>
                <h5 style="font-weight: 600;"><?php echo $award ?></h5>
            </b><br>
            <h5><?php echo $award_date2 . " | " . " | " . $award_for2; ?></h5>
            <b>
                <h5 style="font-weight: 600;"><?php echo $award2 ?></h5>
            </b><br>
            <?php if ($additional_title) { ?>
                <div class="col-12 bg-dark">
                    <div class="card-title text-white">
                        <h2>Additional Info</h2>
                    </div>
                </div><br>
                <?php
                $obj = json_decode($additional_title);

                foreach ($obj as $key => $value) {
                    echo "<h5>" . $key . "</h5>" . "<b><h5 style='font-weight: 600;'>" . $value . "</h5></b>";
                } ?>
        </div>
    <?php }
    ?>
    </div>
</div>
<script>
    window.print();
</script>