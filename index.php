<?php include('./components/header.php') ?>
<?php include('./includes/global.php'); ?>
<title>Dashboard || Glowedu</title>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row animated bounceIn">
            <?php if ($user_type == 'student') { ?>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-midnight-bloom">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Test Assignment</div>
                                <div class="widget-subheading">Total Number of Test Assignment</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>
                                        <?php
                                        $query = "SELECT * FROM courses";
                                        $result = mysqli_query($conn, $query);
                                        echo $rowcount = mysqli_num_rows($result);
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-arielle-smile">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Progress</div>
                                <div class="widget-subheading">Progress Report</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>
                                        <?php
                                        $query = "SELECT * FROM match_id WHERE student_id = '$user_id'";
                                        $result = mysqli_query($conn, $query);
                                        echo $rowcount = mysqli_num_rows($result);
                                        ?>%
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-3 widget-content bg-grow-early">
                        <div class="widget-content-wrapper text-white">
                            <div class="widget-content-left">
                                <div class="widget-heading">Student</div>
                                <div class="widget-subheading">Total Student</div>
                            </div>
                            <div class="widget-content-right">
                                <div class="widget-numbers text-white"><span>
                                        <?php
                                        $query = "SELECT * FROM users WHERE user_type = 'student'";
                                        $result = mysqli_query($conn, $query);
                                        echo $rowcount = mysqli_num_rows($result);
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">How to use this platform?</h5>
                        <iframe class="col-12" height="550" src="https://www.youtube.com/embed/XVl1AxvlVg8" frameborder="0" allowfullscreen>

                        </iframe>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <h5 class="card-title">Your Subscription</h5>
                        <div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active ">
                                    <div class="card bg-amy-crisp">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h5>Data Science</h5>
                                            </div>
                                            <div class="card">
                                                <div class="widget-subheading p-5">
                                                    <h6>Python is an interpreted high-level general-purpose programming language. Applications of Python range from data analytics to AI development.<br>Enrol in our Data Science skill track and start your Python programming journey.</h6><br>
                                                    <?php
                                                    $payment_selectioni_query_python = "SELECT * FROM `payment` WHERE name = '$username' AND course_category = 'python'";
                                                    $payment_selectioni_result_python = mysqli_query($conn, $payment_selectioni_query_python);
                                                    while ($rows = mysqli_fetch_assoc($payment_selectioni_result_python)) {
                                                        $days = $rows['days'];
                                                    }
                                                    $row_count = mysqli_num_rows($payment_selectioni_result_python);
                                                    if ($row_count > 0) {
                                                        echo "<button class='col-12 btn btn-primary disabled'>Buy Course Days Left:- $days</button>";
                                                    } else {
                                                        echo "<a href='packages.php'><button class='col-12 btn btn-primary'>Buy Course</button></a>";
                                                    }        ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card bg-amy-crisp">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h5>Web Development</h5>
                                            </div>
                                            <div class="card">
                                                <div class="widget-subheading p-5">
                                                    <h6>JavaScript is a programming language that conforms to the ECMAScript specification. Application of JavaScript range from software to web development. Enrol in our JavaScript skill track and start your JavaScript programming journey.</h6><br>
                                                    <?php
                                                    $payment_selectioni_query_python = "SELECT * FROM `payment` WHERE name = '$username' AND course_category = 'javascript'";
                                                    $payment_selectioni_result_python = mysqli_query($conn, $payment_selectioni_query_python);
                                                    while ($rows = mysqli_fetch_assoc($payment_selectioni_result_python)) {
                                                        $days = $rows['days'];
                                                    }
                                                    $row_count = mysqli_num_rows($payment_selectioni_result_python);
                                                    if ($row_count > 0) {
                                                        echo "<button class='col-12 btn btn-primary disabled'>Buy Course Days Left:- $days</button>";
                                                    } else {
                                                        echo "<a href='packages.php'><button class='col-12 btn btn-primary'>Buy Course</button></a>";
                                                    }        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card bg-amy-crisp">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h5>C</h5>
                                            </div>
                                            <div class="card">
                                                <div class="widget-subheading p-5">
                                                    <h6>C language is a general purpose programming language which is extremely powerful. <br>Applications of C language range from software development to computer vision. Enrol in our C skill track and start your C programming journey.</h6><br>
                                                    <?php
                                                    $payment_selectioni_query_python = "SELECT * FROM `payment` WHERE name = '$username' AND course_category = 'cc_plus'";
                                                    $payment_selectioni_result_python = mysqli_query($conn, $payment_selectioni_query_python);
                                                    while ($rows = mysqli_fetch_assoc($payment_selectioni_result_python)) {
                                                        $days = $rows['days'];
                                                    }
                                                    $row_count = mysqli_num_rows($payment_selectioni_result_python);
                                                    if ($row_count > 0) {
                                                        echo "<button class='col-12 btn btn-primary disabled'>Buy Course Days Left:- $days</button>";
                                                    } else {
                                                        echo "<a href='packages.php'><button class='col-12 btn btn-primary'>Buy Course</button></a>";
                                                    }        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="card bg-amy-crisp">
                                        <div class="card-body">
                                            <div class="card-header">
                                                <h5>C++</h5>
                                            </div>
                                            <div class="card">
                                                <div class="widget-subheading p-5">
                                                    <h6>C++ is a general-purpose programming language created as an extension of the C language. Applications of C++ language range from game development to computer vision. Enrol in our C++ skill track and start your C++ programming journey.</h6><br>
                                                    <?php
                                                    $payment_selectioni_query_python = "SELECT * FROM `payment` WHERE name = '$username' AND course_category = 'cc_plus'";
                                                    $payment_selectioni_result_python = mysqli_query($conn, $payment_selectioni_query_python);
                                                    while ($rows = mysqli_fetch_assoc($payment_selectioni_result_python)) {
                                                        $days = $rows['days'];
                                                    }
                                                    $row_count = mysqli_num_rows($payment_selectioni_result_python);
                                                    if ($row_count > 0) {
                                                        echo "<button class='col-12 btn btn-primary disabled'>Buy Course Days Left:- $days</button>";
                                                    } else {
                                                        echo "<a href='packages.php'><button class='col-12 btn btn-primary'>Buy Course</button></a>";
                                                    }        ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card bg-amy-crisp">
                    <div class="card-body">
                        <div class="main-card card">
                            <div class="card-body">
                                <h5 class="card-title">GET FREE ACCESS</h5>
                                <div id="exampleAccordion" data-children=".item">
                                    <div class="item">
                                        <button type="button" aria-expanded="true" aria-controls="exampleAccordion1" data-toggle="collapse" href="#collapseExample" class="m-0 p-0 btn btn-link">Click here for more details!</button>
                                        <div data-parent="#exampleAccordion" id="collapseExample" class="collapse show">
                                            <input type='text' class='col-8' id='myInput' value='https://learn.glowedu.co.in/reg_ref_friend.php?ref_email=<?= $email ?>' style='border: none;'>
                                            <button onclick='myFunction()' class='btn btn-primary'> Copy to clipboard</button>
                                            <script>
                                                function myFunction() {
                                                    /* Get the text field */
                                                    var copyText = document.getElementById('myInput');

                                                    /* Select the text field */
                                                    copyText.select();
                                                    copyText.setSelectionRange(0, 99999); /* For mobile devices */

                                                    /* Copy the text inside the text field */
                                                    navigator.clipboard.writeText(copyText.value);

                                                    /* Alert the copied text */
                                                    alert('Copied the text: ' + copyText.value);
                                                }
                                            </script>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <button type="button" aria-expanded="false" aria-controls="exampleAccordion2" data-toggle="collapse" href="#collapseExample2" class="m-0 p-0 btn btn-link">Click here for more details!</button>
                                        <div data-parent="#exampleAccordion" id="collapseExample2" class="collapse">
                                            <p class="mb-3">
                                            <ol>
                                                <li>Step 1: Copy the link.</li>
                                                <li>Step 2: Share the link to your friends and family.</li>
                                                <li>Step 3: Ask them to copy this into a browser and register using the same link.</li>
                                                <li>Step 4: Once they register you will get 5 days of free access.</li>
                                            </ol>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss">
                            </i>
                            New Courses
                        </div>
                        <ul class="nav">
                            <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">New</a></li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">New Courses</h6>
                                <div class="scroll-area-sm">
                                    <div class="scrollbar-container">
                                        <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                            <?php
                                            $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 10";
                                            $result = mysqli_query($conn, $query);
                                            while ($rows = mysqli_fetch_assoc($result)) {
                                                $course_topic = $rows['course_topic'];
                                                $course_category = $rows['course_category'];
                                                echo "
                                                <li class='list-group-item'>
                                                <div class='widget-content p-0'>
                                                    <div class='widget-content-wrapper'>
                                                        <div class='widget-content-left'>
                                                            <div class='widget-heading'>$course_topic</div>
                                                            <div class='widget-subheading'>$course_category</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                                ";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure">
                            </i>
                            Progress Indicators
                        </div>
                        <div class="btn-actions-pane-right">
                            <div class="nav">
                                <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Tab 1</a>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="tab-eg-55">
                            <div class="widget-chart p-3">
                                <div class="widget-chart-content text-center">
                                    <div class="widget-description mt-0 text-warning">
                                        <i class="fa fa-arrow-left"></i>
                                        <span class="pl-1">GO to the progress pages |</span>
                                        <span class="text-muted opacity-8 pl-1">| Buy new modules to get more study material!!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="pt-2 card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-muted">
                                                            <?php
                                                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'python'";
                                                            $result = mysqli_query($conn, $query);
                                                            echo $rowcount = mysqli_num_rows($result);
                                                            ?>%
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">Python</div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-muted">
                                                            <?php
                                                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'javascript'";
                                                            $result = mysqli_query($conn, $query);
                                                            echo $rowcount = mysqli_num_rows($result);
                                                            ?>%
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">Javascript</div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="widget-content">
                                            <div class="widget-content-outer">
                                                <div class="widget-content-wrapper">
                                                    <div class="widget-content-left">
                                                        <div class="widget-numbers fsize-3 text-muted">
                                                            <?php
                                                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'cc_plus'";
                                                            $result = mysqli_query($conn, $query);
                                                            echo $rowcount = mysqli_num_rows($result);
                                                            ?>%
                                                        </div>
                                                    </div>
                                                    <div class="widget-content-right">
                                                        <div class="text-muted opacity-6">C & C ++</div>
                                                    </div>
                                                </div>
                                                <div class="widget-progress-wrapper mt-1">
                                                    <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-header">
                        <div class="btn-actions-pane-right">
                            <div role="group" class="btn-group-sm btn-group">
                                Q&A
                            </div>
                        </div>
                    </div>
                    <div class="scroll-area-lg">
                        <div class="scrollbar-container">
                            <div class="d-block card-footer">
                                <div class="main-card card">
                                    <div class="card-body">
                                        <?php
                                        $query = "SELECT * FROM group_dis ORDER BY post_id DESC LIMIT 5";
                                        $result = mysqli_query($conn, $query);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $postid = $rows['post_id'];
                                            $post_content = $rows['post_content'];
                                            $post_user_id = $rows['post_user_id'];
                                            $post_picture = $rows['post_picture'];
                                            $created_at = $rows['created_at'];

                                            $query2 = "SELECT * FROM users WHERE id = '$post_user_id'";
                                            $result2 = mysqli_query($conn, $query2);
                                            while ($rows = mysqli_fetch_assoc($result2)) {
                                                $user_id = $rows['id'];
                                                $username = $rows['username'];
                                                $user_type = $rows['user_type'];
                                                $email = $rows['email'];
                                                if (empty($rows['profile_pic'])) {
                                                    $profile_pic = './assets/images/avatars/avatar.png';
                                                } else {
                                                    $profile_pic = "./userdata/" . $rows['profile_pic'];
                                                }
                                                echo "<div class='card-shadow-primary border mb-3 card-body border-primary'>
                                        <div class='row'>
                                            <div class='col-6 d-md-none'>
                                                <span class='text-bold'><strong>$username</strong></span>
                                            </div>
                                            <div class='col-2 d-none d-md-block'>
                                                <center><img class='img rounded-circle' width='50' src='$profile_pic' alt=''><span class='d-none d-md-block'>$username</span></center>
                                            </div>
                                            <div class='col-9'>
                                                <span class='text-muted'>$post_content</span>
                                                ";
                                                if (!empty($post_picture)) {
                                                    echo "<br><strong>Image Included in the post!</strong>";
                                                }
                                                echo "
                                            </div>
                                            <div class='col-1 d-none d-sm-block'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                            <div class='col-10 mt-4 d-block d-sm-none'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                        </div>
                                    </div>";
                                            }
                                        }
                                        ?>

                                    </div>
                                </div><br>
                                <center><a href="./group_dis.php"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-dark"><i class="pe-7s-album btn-icon-wrapper"> </i> View All</button></a></center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- techer dashboard  -->
<?php } elseif ($user_type == 'teacher') { ?>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Students</div>
                    <div class="widget-subheading">Total Number of Students</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM student_data";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Tests Deployed</div>
                    <div class="widget-subheading">Progress Report</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id'";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Analytics</div>
                    <div class="widget-subheading">Analytics</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM users WHERE user_type = 'student'";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>%
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title">How to use this platform?</h5>
                <iframe class="col-12" height="550" src="https://www.youtube.com/embed/XVl1AxvlVg8" frameborder="0" allowfullscreen>

                </iframe>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header-tab-animation card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-apartment icon-gradient bg-love-kiss">
                    </i>
                    Tests Deployed
                </div>
                <ul class="nav">
                    <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Create New</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tabs-eg-77">
                        <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">New Courses</h6>
                        <div class="scroll-area-sm">
                            <div class="scrollbar-container">
                                <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                    <?php
                                    $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 10";
                                    $result = mysqli_query($conn, $query);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $course_topic = $rows['course_topic'];
                                        $course_category = $rows['course_category'];
                                        echo "<li class='list-group-item'>
                                                <div class='widget-content p-0'>
                                                    <div class='widget-content-wrapper'>
                                                        <div class='widget-content-left'>
                                                            <div class='widget-heading'>$course_topic</div>
                                                            <div class='widget-subheading'>$course_category</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-6">
        <div class="mb-3 card">
            <div class="card-header-tab card-header">
                <div class="card-header-title">
                    <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure">
                    </i>
                    Student Analysis
                </div>
                <div class="btn-actions-pane-right">
                    <div class="nav">
                        <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Tab 1</a>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="tab-eg-55">
                    <div class="widget-chart p-3">
                        <div class="widget-chart-content text-center">
                            <div class="widget-description mt-0 text-warning">
                                <i class="fa fa-arrow-left"></i>
                                <span class="pl-1">GO to the progress pages |</span>
                                <span class="text-muted opacity-8 pl-1">| Buy new modules to get more study material!!</span>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2 card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers fsize-3 text-muted">
                                                    <?php
                                                    $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'python'";
                                                    $result = mysqli_query($conn, $query);
                                                    echo $rowcount = mysqli_num_rows($result);
                                                    ?>%
                                                </div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6">Python</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount ?>%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers fsize-3 text-muted">
                                                    <?php
                                                    $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'javascript'";
                                                    $result = mysqli_query($conn, $query);
                                                    echo $rowcount = mysqli_num_rows($result);
                                                    ?>%
                                                </div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6">Javascript</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-numbers fsize-3 text-muted">
                                                    <?php
                                                    $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'cc_plus'";
                                                    $result = mysqli_query($conn, $query);
                                                    echo $rowcount = mysqli_num_rows($result);
                                                    ?>%
                                                </div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="text-muted opacity-6">C & C ++</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper mt-1">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        Q&A
                    </div>
                </div>
            </div>
            <div class="scroll-area-lg">
                <div class="scrollbar-container">
                    <div class="d-block card-footer">
                        <div class="main-card card">
                            <div class="card-body">
                                <?php
                                $query = "SELECT * FROM group_dis ORDER BY post_id DESC LIMIT 5";
                                $result = mysqli_query($conn, $query);
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    $postid = $rows['post_id'];
                                    $post_content = $rows['post_content'];
                                    $post_user_id = $rows['post_user_id'];
                                    $post_picture = $rows['post_picture'];
                                    $created_at = $rows['created_at'];

                                    $query2 = "SELECT * FROM users WHERE id = '$post_user_id'";
                                    $result2 = mysqli_query($conn, $query2);
                                    while ($rows = mysqli_fetch_assoc($result2)) {
                                        $user_id = $rows['id'];
                                        $username = $rows['username'];
                                        $user_type = $rows['user_type'];
                                        $email = $rows['email'];
                                        if (empty($rows['profile_pic'])) {
                                            $profile_pic = './assets/images/avatars/avatar.png';
                                        } else {
                                            $profile_pic = "./userdata/" . $rows['profile_pic'];
                                        }
                                        echo "<div class='card-shadow-primary border mb-3 card-body border-primary'>
                                        <div class='row'>
                                            <div class='col-6 d-md-none'>
                                                <span class='text-bold'><strong>$username</strong></span>
                                            </div>
                                            <div class='col-2 d-none d-md-block'>
                                                <center><img class='img rounded-circle' width='50' src='$profile_pic' alt=''><span class='d-none d-md-block'>$username</span></center>
                                            </div>
                                            <div class='col-9'>
                                                <span class='text-muted'>$post_content</span>
                                                ";
                                        if (!empty($post_picture)) {
                                            echo "<br><strong>Image Included in the post!</strong>";
                                        }
                                        echo "
                                            </div>
                                            <div class='col-1 d-none d-sm-block'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                            <div class='col-10 mt-4 d-block d-sm-none'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                        </div>
                                    </div>";
                                    }
                                }
                                ?>

                            </div>
                        </div><br>
                        <center><a href="./group_dis.php"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-dark"><i class="pe-7s-album btn-icon-wrapper"> </i> View All</button></a></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php } elseif ($user_type == 'recruiter') { ?>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Total Students</div>
                    <div class="widget-subheading">Total Number of Students</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM student_data";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Tests Deployed</div>
                    <div class="widget-subheading">Progress Report</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id'";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Test Completed</div>
                    <div class="widget-subheading">Total Test Completed</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM users WHERE user_type = 'student'";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">How to use this platform?</h5>
                    <iframe class="col-12" height="550" src="https://www.youtube.com/embed/XVl1AxvlVg8" frameborder="0" allowfullscreen>

                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss">
                        </i>
                        Tests Deployed
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">Create New</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">New Courses</h6>
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container">
                                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                        <?php
                                        $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 10";
                                        $result = mysqli_query($conn, $query);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $course_topic = $rows['course_topic'];
                                            $course_category = $rows['course_category'];
                                            echo "<li class='list-group-item'>
                                                <div class='widget-content p-0'>
                                                    <div class='widget-content-wrapper'>
                                                        <div class='widget-content-left'>
                                                            <div class='widget-heading'>$course_topic</div>
                                                            <div class='widget-subheading'>$course_category</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">
                        <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure">
                        </i>
                        Results Analysis
                    </div>
                    <div class="btn-actions-pane-right">
                        <div class="nav">
                            <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Tab 1</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tab-eg-55">
                        <div class="widget-chart p-3">
                            <div class="widget-chart-content text-center">
                                <div class="widget-description mt-0 text-warning">
                                    <i class="fa fa-arrow-left"></i>
                                    <span class="pl-1">GO to the progress pages |</span>
                                    <span class="text-muted opacity-8 pl-1">| Buy new modules to get more study material!!</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2 card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">
                                                        <?php
                                                        $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'python'";
                                                        $result = mysqli_query($conn, $query);
                                                        echo $rowcount = mysqli_num_rows($result);
                                                        ?>%
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">Python</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">
                                                        <?php
                                                        $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'javascript'";
                                                        $result = mysqli_query($conn, $query);
                                                        echo $rowcount = mysqli_num_rows($result);
                                                        ?>%
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">Javascript</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">
                                                        <?php
                                                        $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'cc_plus'";
                                                        $result = mysqli_query($conn, $query);
                                                        echo $rowcount = mysqli_num_rows($result);
                                                        ?>%
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">C & C ++</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            Q&A
                        </div>
                    </div>
                </div>
                <div class="scroll-area-lg">
                    <div class="scrollbar-container">
                        <div class="d-block card-footer">
                            <div class="main-card card">
                                <div class="card-body">
                                    <?php
                                    $query = "SELECT * FROM group_dis ORDER BY post_id DESC LIMIT 5";
                                    $result = mysqli_query($conn, $query);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $postid = $rows['post_id'];
                                        $post_content = $rows['post_content'];
                                        $post_user_id = $rows['post_user_id'];
                                        $post_picture = $rows['post_picture'];
                                        $created_at = $rows['created_at'];

                                        $query2 = "SELECT * FROM users WHERE id = '$post_user_id'";
                                        $result2 = mysqli_query($conn, $query2);
                                        while ($rows = mysqli_fetch_assoc($result2)) {
                                            $user_id = $rows['id'];
                                            $username = $rows['username'];
                                            $user_type = $rows['user_type'];
                                            $email = $rows['email'];
                                            if (empty($rows['profile_pic'])) {
                                                $profile_pic = './assets/images/avatars/avatar.png';
                                            } else {
                                                $profile_pic = "./userdata/" . $rows['profile_pic'];
                                            }
                                            echo "<div class='card-shadow-primary border mb-3 card-body border-primary'>
                                        <div class='row'>
                                            <div class='col-6 d-md-none'>
                                                <span class='text-bold'><strong>$username</strong></span>
                                            </div>
                                            <div class='col-2 d-none d-md-block'>
                                                <center><img class='img rounded-circle' width='50' src='$profile_pic' alt=''><span class='d-none d-md-block'>$username</span></center>
                                            </div>
                                            <div class='col-9'>
                                                <span class='text-muted'>$post_content</span>
                                                ";
                                            if (!empty($post_picture)) {
                                                echo "<br><strong>Image Included in the post!</strong>";
                                            }
                                            echo "
                                            </div>
                                            <div class='col-1 d-none d-sm-block'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                            <div class='col-10 mt-4 d-block d-sm-none'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                    }
                                    ?>

                                </div>
                            </div><br>
                            <center><a href="./group_dis.php"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-dark"><i class="pe-7s-album btn-icon-wrapper"> </i> View All</button></a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php } else { ?>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-midnight-bloom">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Courses</div>
                    <div class="widget-subheading">Total Number of Courses</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM courses";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-arielle-smile">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Progress</div>
                    <div class="widget-subheading">Progress Report</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM match_id WHERE student_id = '$user_id'";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>%
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-4">
        <div class="card mb-3 widget-content bg-grow-early">
            <div class="widget-content-wrapper text-white">
                <div class="widget-content-left">
                    <div class="widget-heading">Student</div>
                    <div class="widget-subheading">Total Student</div>
                </div>
                <div class="widget-content-right">
                    <div class="widget-numbers text-white"><span>
                            <?php
                            $query = "SELECT * FROM users WHERE user_type = 'student'";
                            $result = mysqli_query($conn, $query);
                            echo $rowcount = mysqli_num_rows($result);
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header-tab-animation card-header">
                    <div class="card-header-title">
                        <i class="header-icon lnr-apartment icon-gradient bg-love-kiss">
                        </i>
                        New Courses
                    </div>
                    <ul class="nav">
                        <li class="nav-item"><a href="javascript:void(0);" class="active nav-link">New</a></li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tabs-eg-77">
                            <h6 class="text-muted text-uppercase font-size-md opacity-5 font-weight-normal">New Courses</h6>
                            <div class="scroll-area-sm">
                                <div class="scrollbar-container">
                                    <ul class="rm-list-borders rm-list-borders-scroll list-group list-group-flush">
                                        <?php
                                        $query = "SELECT * FROM courses ORDER BY id DESC LIMIT 10";
                                        $result = mysqli_query($conn, $query);
                                        while ($rows = mysqli_fetch_assoc($result)) {
                                            $course_topic = $rows['course_topic'];
                                            $course_category = $rows['course_category'];
                                            echo "<li class='list-group-item'>
                                                <div class='widget-content p-0'>
                                                    <div class='widget-content-wrapper'>
                                                        <div class='widget-content-left'>
                                                            <div class='widget-heading'>$course_topic</div>
                                                            <div class='widget-subheading'>$course_category</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>";
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 col-lg-6">
            <div class="mb-3 card">
                <div class="card-header-tab card-header">
                    <div class="card-header-title">
                        <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure">
                        </i>
                        Progress Indicators
                    </div>
                    <div class="btn-actions-pane-right">
                        <div class="nav">
                            <a href="javascript:void(0);" class="border-0 btn-pill btn-wide btn-transition active btn btn-outline-alternate">Tab 1</a>
                        </div>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="tab-eg-55">
                        <div class="widget-chart p-3">
                            <div class="widget-chart-content text-center">
                                <div class="widget-description mt-0 text-warning">
                                    <i class="fa fa-arrow-left"></i>
                                    <span class="pl-1">GO to the progress pages |</span>
                                    <span class="text-muted opacity-8 pl-1">| Buy new modules to get more study material!!</span>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2 card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">
                                                        <?php
                                                        $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'python'";
                                                        $result = mysqli_query($conn, $query);
                                                        echo $rowcount = mysqli_num_rows($result);
                                                        ?>%
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">Python</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="63" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">
                                                        <?php
                                                        $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'javascript'";
                                                        $result = mysqli_query($conn, $query);
                                                        echo $rowcount = mysqli_num_rows($result);
                                                        ?>%
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">Javascript</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="widget-content">
                                        <div class="widget-content-outer">
                                            <div class="widget-content-wrapper">
                                                <div class="widget-content-left">
                                                    <div class="widget-numbers fsize-3 text-muted">
                                                        <?php
                                                        $query = "SELECT * FROM match_id WHERE student_id = '$user_id' AND course_category = 'cc_plus'";
                                                        $result = mysqli_query($conn, $query);
                                                        echo $rowcount = mysqli_num_rows($result);
                                                        ?>%
                                                    </div>
                                                </div>
                                                <div class="widget-content-right">
                                                    <div class="text-muted opacity-6">C & C ++</div>
                                                </div>
                                            </div>
                                            <div class="widget-progress-wrapper mt-1">
                                                <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $rowcount; ?>%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="main-card mb-3 card">
                <div class="card-header">
                    <div class="btn-actions-pane-right">
                        <div role="group" class="btn-group-sm btn-group">
                            Q&A
                        </div>
                    </div>
                </div>
                <div class="scroll-area-lg">
                    <div class="scrollbar-container">
                        <div class="d-block card-footer">
                            <div class="main-card card">
                                <div class="card-body">
                                    <?php
                                    $query = "SELECT * FROM group_dis ORDER BY post_id DESC LIMIT 5";
                                    $result = mysqli_query($conn, $query);
                                    while ($rows = mysqli_fetch_assoc($result)) {
                                        $postid = $rows['post_id'];
                                        $post_content = $rows['post_content'];
                                        $post_user_id = $rows['post_user_id'];
                                        $post_picture = $rows['post_picture'];
                                        $created_at = $rows['created_at'];

                                        $query2 = "SELECT * FROM users WHERE id = '$post_user_id'";
                                        $result2 = mysqli_query($conn, $query2);
                                        while ($rows = mysqli_fetch_assoc($result2)) {
                                            $user_id = $rows['id'];
                                            $username = $rows['username'];
                                            $user_type = $rows['user_type'];
                                            $email = $rows['email'];
                                            if (empty($rows['profile_pic'])) {
                                                $profile_pic = './assets/images/avatars/avatar.png';
                                            } else {
                                                $profile_pic = "./userdata/" . $rows['profile_pic'];
                                            }
                                            echo "<div class='card-shadow-primary border mb-3 card-body border-primary'>
                                        <div class='row'>
                                            <div class='col-6 d-md-none'>
                                                <span class='text-bold'><strong>$username</strong></span>
                                            </div>
                                            <div class='col-2 d-none d-md-block'>
                                                <center><img class='img rounded-circle' width='50' src='$profile_pic' alt=''><span class='d-none d-md-block'>$username</span></center>
                                            </div>
                                            <div class='col-9'>
                                                <span class='text-muted'>$post_content</span>
                                                ";
                                            if (!empty($post_picture)) {
                                                echo "<br><strong>Image Included in the post!</strong>";
                                            }
                                            echo "
                                            </div>
                                            <div class='col-1 d-none d-sm-block'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                            <div class='col-10 mt-4 d-block d-sm-none'>
                                            <a href='post.php?post_id=$postid'><button class='btn btn-primary'>Open Post</button></a>
                                            </div>
                                        </div>
                                    </div>";
                                        }
                                    }
                                    ?>

                                </div>
                            </div><br>
                            <center><a href="./group_dis.php"><button class="mr-2 btn-icon btn-icon-only btn btn-outline-dark"><i class="pe-7s-album btn-icon-wrapper"> </i> View All</button></a></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php } ?>
<?php include('./components/footer.php'); ?>
<?php include('./components/scripts.php'); ?>