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

<body>
    <div class=" resume ">


        <div class=" left-section" style="border-top-left-radius: 180px;  border-top-right-radius: 180px;">
            <div class=" profile">
                <img src="../<?php echo $profile_pic; ?>" alt="" class=" profile-img ">
            </div>
            <h1 style="color: white; letter-spacing: normal; font-size: 1.125rem;
            line-height: 1.75rem; font: bold; font-family: sans-serif; ">ABOUT ME</h1>

            <hr>
            <p style="color: white; margin-top: 15px; letter-spacing:0.05rem; font-size: 0.875rem;
            line-height: 1.25rem; font-family: sans-serif;"><?php echo $about; ?>
            </p>

            <h1 style="color: white; font-size: medium; text-transform: uppercase; letter-spacing: 0.1em; font: bold; margin-top: 25px; font-family: sans-serif;">
                Education</h1>

            <hr style="margin-top: 10px;">

            <h1 style="color: white; letter-spacing: 0.05em; font-size: 0.875rem;
            line-height: 1.25rem; margin-top: 9px; font-family: sans-serif;"><?php echo $education_year . " | " . " | " . $education_title; ?></h1>
            <h1 style="color: white; font-weight: 600;  font-size: small; margin-top: -7px;
            margin-bottom: 19px; font-family: sans-serif;"><?php echo $education_from ?></h1>

            <h1 style="color: white; letter-spacing: 0.05em; font-size: 0.875rem;
            line-height: 1.25rem; margin-top: 9px; font-family: sans-serif;"><?php echo $education_year2 . " | " . " | " . $education_title2; ?></h1>
            <h1 style="color: white; font-weight: 600; font-size: small; margin-top: -7px; font-family: sans-serif;"><?php echo $education_from2 ?></h1>

            <h1 style="color: white; font-size: medium; text-transform: uppercase; letter-spacing: 0.1em; font: bold; margin-top: 25px; font-family: sans-serif;">
                Contact</h1>
            <hr>
            <img src="../assets/images/resume/call.jpeg" alt="" style="width: 28px; margin-top:18px; border-radius: 100%;">
            <h1 style="color: white; font-size: 0.875rem;
            line-height: 1.25rem; margin-left: 35px; margin-top: -28px; font-family: sans-serif;"><?php echo $mobile; ?></h1>

            <img src="../assets/images/resume/mail.jpeg" alt="" style="width: 28px; margin-top:18px; border-radius: 100%;">
            <h1 style="color: white; font-size: 0.875rem;
            line-height: 1.25rem; margin-left: 35px; margin-top: -28px; font-family: sans-serif;"><?php echo $email; ?></h1>

            <img src="../assets/images/resume/web.jpeg" alt="" style="width: 28px; margin-top:18px; border-radius: 100%;">
            <h1 style="color: white; font-size: 0.875rem;
            line-height: 1.25rem; margin-left: 35px; margin-top: -28px; font-family: sans-serif;"><?php echo $address; ?></h1>
        </div>

        <style>
            .resume {
                display: flex;
                /* align-items:center ;
    justify-content: center; */
            }

            .left-section {
                background-color: #1e3a8a;
                width: 292px;
                height: auto;
                padding: 24px;
            }

            .profile {
                display: flex;
                align-items: center;
                justify-content: centre;
                margin-bottom: 8px;
            }

            .profile-img {
                border-radius: 100%;
                border-width: 2px;
                width: -webkit-fill-available;


            }

            .right-section {
                height: auto;
                padding: 2.5em;
                width: 416px;

            }

            .name {
                font-size: 2.5rem;
                line-height: 3rem;
                letter-spacing: .1em;
                text-transform: uppercase;
                margin-top: 133px;
                color: #1e3a8a;
            }

            .skills {
                font-size: medium;
                margin-top: 60px;
                letter-spacing: 0.1em;

            }
        </style>





        <div class=" right-section ">
            <h1 class="name"><?php echo $first_name; ?> <br>
                <?php echo $last_name; ?>
            </h1>

            <p style="color: #1e3a8a; text-transform: uppercase;
            font-weight: bolder; margin-top: 60px; letter-spacing: 0.1em; font-family: sans-serif;">work experince
            </p>

            <p style="margin-top: 15px; font-family: sans-serif;">
                <?php echo $work_experience; ?>
            </p>
            <div class="skills">

                <h1 style="font-weight: bold; font-size: medium; color: #1e3a8a; font-family: sans-serif; text-transform: uppercase;">
                    Award</h1>
                <hr style="background-color: black; height: 1px; margin-top: 18px;">

                <p style=" font-family: sans-serif;"><?php echo $award_date . " | " . " | " . $award_for; ?>
                    <b>
                        <p style="font-weight: 600;"><?php echo $award ?></p>
                    </b><br>
                </p>
                <p style="margin-top: 3px; font-family: sans-serif;"><?php echo $award_date2 . " | " . " | " . $award_for2; ?>
                    <b>
                        <p style="font-weight: 600;"><?php echo $award2 ?></p>
                    </b><br>
                </p>
            </div>
            <?php if ($additional_title) { ?>
                <div class="skills">

                    <h1 style="font-weight: bold; font-size: medium; color: #1e3a8a; font-family: sans-serif; text-transform: uppercase;">
                        Additional Information</h1>
                    <hr style="background-color: black; height: 1px; margin-top: 18px;">
                    <?php
                    $obj = json_decode($additional_title);

                    foreach ($obj as $key => $value) {
                        echo "<p style=' font-family: sans-serif;'>" . $key . "<b>" . "<p style='font-weight: 600;'>" . $value . "</p>
                        </b>
                        </p>";
                    } ?><br>
                </div>
            <?php }
            ?>
        </div>

    </div>
</body>

<script>
    window.print();
</script>

</html>