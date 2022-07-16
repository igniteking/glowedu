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
    $award_date = $rows['award_date'];
    $award_for = $rows['award_for'];
    $award2 = $rows['award2'];
    $award_date2 = $rows['award_date2'];
    $award_for2 = $rows['award_for2'];
    $mobile = $rows['mobile'];
    $address = $rows['address'];
    $work_experience = $rows['work_experience'];
    $address = $rows['address'];
    $profile_pic = $rows['profile_picture'];
    $created_at = $rows['created_at'];
    $additional_title = $rows['additional_title'];
    $additional_content = $rows['additional_content'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <title>CV Template </title>
</head>

<body>
    <hr class="a">
    <div class="profile">
        <div class="profile-img">
            <img src="../<?php echo $profile_pic; ?>" alt="" class="profile-img">
        </div>
        <div class="about">
            <h3 style="margin-bottom: 30px; text-transform:capitalize"><?php echo $first_name . " " . $last_name; ?></h3>
            <span>Email: <SPAN style="color: #4545ae;"> <?php echo $email; ?></SPAN></span><br>
            <!-- <span>Total Exeperience: 6+ years</span><br> -->
            <span>Mobile: +91-<?php echo $mobile; ?></span><br>
            <span>Address: <?php echo $address; ?></span>

        </div>
    </div>
    <div class="summary">
        <h2>
            <span style="color:#4545ae;">Summary</span>
        </h2>
        <?php echo $about; ?>
    </div>
    <div class="work">
        <h2><span style="color:#4545ae;">Work Experience</span></h2>
        <ul>
            <h3><?php echo $work_experience; ?></h3>
            <!-- <table>
            <tr>
                <th>No.</th>
                <th>Course Title</th>
                <th>NO.of <br> students</th>
                <th>Type</th>

            </tr>

            <tr>
                <td>1</td>
                <td>Data Science and machine learning for everyone</td>
                <td>20</td>
                <td>Winter School-2020</td>

            </tr>
            <tr>
                <td>2</td>
                <td>Applied statics with Python and Excel</td>
                <td>22</td>
                <td>Spring Semester Elective-2021</td>

            </tr>
            <tr>
                <td>3</td>
                <td>Data Science and Machine learinig with Python</td>
                <td>23</td>
                <td>Spring Semeter Eletive- 2021</td>

            </tr>
            <tr>
                <td>4</td>
                <td>Image processing with Python </td>
                <td>19</td>
                <td>Summer School - 2021</td>

            </tr>
            <tr>
                <td>5</td>
                <td>Applied statics with Python and Excel</td>
                <td>10</td>
                <td>Monsoon Semester Elective- 2021</td>

            </tr>

        </table> -->

    </div>
    <div class="page2">
        <div class="academics">
            <h2><span style="color:#4545ae ; margin-top: 30px;">Academics Details</span></h2>

            <table>
                <tr>
                    <th>Course</th>
                    <th>Institute/College</th>
                    <th>Year</th>

                </tr>

                <tr>
                    <td><?php echo $education_title; ?></td>
                    <td><?php echo $education_from; ?></td>
                    <td><?php echo $education_year; ?></td>
                </tr>
                <tr>
                    <td><?php echo $education_title2; ?></td>
                    <td><?php echo $education_from2; ?></td>
                    <td><?php echo $education_year2; ?></td>
                </tr>
            </table>


            <hr>
            <div class="recognition" style="height:auto ;">
                <h2><span style="color:#4545ae ;">Recognitions</span></h2>
                <table>
                    <tr>
                        <th>Certification Name</th>
                        <th>Certification From</th>
                        <th>Year</th>

                    </tr>

                    <tr>
                        <td><?php echo $award; ?></td>
                        <td><?php echo $award_for; ?></td>
                        <td><?php echo $award_date; ?></td>

                    </tr>
                    <tr>
                        <td><?php echo $award2; ?></td>
                        <td><?php echo $award_for2; ?></td>
                        <td><?php echo $award_date2; ?></td>

                    </tr>
                </table>


            </div>
            <div class="recognition" style="height:auto ;">
                <h2><span style="color:#4545ae ;">Additional Information</span></h2>
                <table>
                    <tr>
                        <?php $additional_title = (explode(',', $additional_title));
                        foreach ($additional_title as $additional_title) {
                            echo "<td> $additional_title</td>";
                        } ?>
                    </tr>
                    <tr>
                        <?php
                        $additional_content = (explode(',', $additional_content));
                        foreach ($additional_content as $additional_content) {
                            echo "<td> $additional_content</td>";
                        } ?>
                    </tr>
                </table>


            </div>

            <p style="text-transform: capitalize;"><?php echo $first_name . " " . $last_name ?> CV - <?php echo $created_at ?></p>


</body>
<style>
    @import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@300&display=swap');

    .profile {
        display: flex;
    }

    .profile-img {
        width: 200px;
        height: 200px;
        margin-top: 10px;
    }


    .about {
        margin-top: 10px;
        margin-left: 20px;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 909px;
        margin-left: 30px;
        margin-top: 30px;
    }

    td,
    th {
        border: 3px solid black;
        text-align: left;
        padding: 5px;
    }

    hr {
        height: 3px;
        background-color: black;
        margin-top: 70px;
    }

    .a {
        margin-top: 16px;
    }
</style>

</html>