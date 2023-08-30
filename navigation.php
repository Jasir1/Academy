<?php

// session_start();

// require "connection.php";

?>

<div class="row home-nav-logo">
    <div class="col-12 mt-3 d-flex justify-content-center">
        <img class="shadow home-nav-logo" src="resources/logo new.png">
    </div>
    <h3 class="fs-5 text-dark user-name text-center">Academy</h3>
</div>

<div class="col-12 mt-4">
    <hr style="width: 100%;" />
</div>

<?php
if (isset($_SESSION["student"]["email"])) {

    $userrs = Database::search("SELECT * FROM `student` WHERE `email`='" . $_SESSION["student"]["email"] . "'");
    $user = $userrs->fetch_assoc();

    $profileImage = Database::search("SELECT * FROM `student_profile_img` WHERE `user_email`='" . $_SESSION["student"]["email"] . "'");
    $profile_num = $profileImage->num_rows;

    if ($profile_num > 0) {
        $profile = $profileImage->fetch_assoc();
?>
        <div class="row mt-1 home-nav-profile d-none d-lg-block">
            <div class="col-12 mx-auto d-flex justify-content-center">
                <div class="row shadow" style="width: 150px; height: 130px;">
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <img class="home-nav-profile-img rounded-circle" src="<?php echo $profile["code"] ?>" style="width: 60px; height: 60px;">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="fs-5 text-light user-name"><?php echo $user["username"] ?></h3>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
    ?>
        <div class="row mt-1 home-nav-profile d-none d-lg-block">
            <div class="col-8 mx-auto d-flex justify-content-center">
                <div class="row shadow">
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <img class="home-nav-profile-img rounded-circle" src="icons/user_default.png">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="fs-5 text-light user-name"><?php echo $user["username"] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else if (isset($_SESSION["teacher"]["email"])) {

    $userrs = Database::search("SELECT * FROM `teacher` WHERE `email`='" . $_SESSION["teacher"]["email"] . "'");
    $user = $userrs->fetch_assoc();

    $profileImage = Database::search("SELECT * FROM `teacher_profile_img` WHERE `user_email`='" . $_SESSION["teacher"]["email"] . "'");
    $profile_num = $profileImage->num_rows;

    if ($profile_num > 0) {
        $profile = $profileImage->fetch_assoc();
    ?>
        <div class="row mt-1 home-nav-profile d-none d-lg-block">
            <div class="col-8 mx-auto d-flex justify-content-center">
                <div class="row shadow">
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <img class="home-nav-profile-img rounded-circle" src="<?php echo $profile["code"] ?>">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="fs-5 text-light user-name"><?php echo $user["username"] ?></h3>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
    ?>
        <div class="row mt-1 home-nav-profile d-none d-lg-block">
            <div class="col-8 mx-auto d-flex justify-content-center">
                <div class="row shadow">
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <img class="home-nav-profile-img rounded-circle" src="icons/user_default.png">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="fs-5 text-light user-name"><?php echo $user["username"] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else if (isset($_SESSION["academic_officer"]["email"])) {

    $userrs = Database::search("SELECT * FROM `academic_officer` WHERE `email`='" . $_SESSION["academic_officer"]["email"] . "'");
    $user = $userrs->fetch_assoc();

    $profileImage = Database::search("SELECT * FROM `academic_officer_profile_img` WHERE `user_email`='" . $_SESSION["academic_officer"]["email"] . "'");
    $profile_num = $profileImage->num_rows;

    if ($profile_num > 0) {
        $profile = $profileImage->fetch_assoc();
    ?>
        <div class="row mt-1 home-nav-profile d-none d-lg-block">
            <div class="col-8 mx-auto d-flex justify-content-center">
                <div class="row shadow">
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <img class="home-nav-profile-img rounded-circle" src="<?php echo $profile["code"] ?>">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="fs-5 text-light user-name"><?php echo $user["username"] ?></h3>
                    </div>
                </div>
            </div>
        </div>

    <?php
    } else {
    ?>
        <div class="row mt-1 home-nav-profile d-none d-lg-block">
            <div class="col-8 mx-auto d-flex justify-content-center">
                <div class="row shadow">
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <img class="home-nav-profile-img rounded-circle" src="icons/user_default.png">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="fs-5 text-light user-name"><?php echo $user["username"] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
} else {
    ?>
    <div class="row mt-1 home-nav-profile d-none d-lg-block">
        <div class="col-8 mx-auto d-flex justify-content-center">
            <div class="row shadow">
                <div class="col-12 mt-2 d-flex justify-content-center">
                    <img class="home-nav-profile-img rounded-circle" src="icons/user_default.png">
                </div>
                <div class="col-12 d-flex justify-content-center">
                    <h3 class="fs-5 text-light user-name">User</h3>
                </div>
            </div>
        </div>
    </div>
<?php
}

if (isset($_SESSION["student"])) {
?>
    <h3 class="fs-5 text-light user-name mt-2">Student</h3>
    <ul class="navbar-nav d-flex flex-column mt-1 w-100" style="overflow-y: auto;">
        <li class="nav-item home-nav-btn" id="home">
            <a href="home.php" class="nav-link text-light px-4"><i class="bi bi-house-fill fs-2 text-white"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Home</span></a>
        </li>
        <li class="nav-item home-nav-btn" id="profile">
            <a href="userprofile.php" class="nav-link text-light px-4"><i class="bi bi-person-fill fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Profile</span></a>
        </li>
        <li class="nav-item home-nav-btn" id="payments">
            <a href="" class="nav-link text-light px-4"><i class="fa fa-clipboard-list fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Payments</span></a>
        </li>
        <li class="nav-item home-nav-btn" id="lessions">
            <a href="lessions.php" class="nav-link text-light px-4"><i class="bi bi-book-half fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Lessions</span></a>
        </li>
        <li class="nav-item home-nav-btn" id="assignments">
            <a href="assignments.php" class="nav-link text-light px-4"><i class="bi bi-files fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Assignments</span></a>
        </li>
        <li class="nav-item home-nav-btn" id="answersheets">
            <a href="answersheets.php" class="nav-link text-light px-4"><i class="bi bi-file-text fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Answersheets</span></a>
        </li>
        <li class="nav-item home-nav-btn" id="marks">
            <a href="marks.php" class="nav-link text-light px-4"><i class="bi bi-trophy-fill fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Marks</span></a>
        </li>
    <?php
} else  if (isset($_SESSION["teacher"])) {
    ?>
        <h3 class="fs-5 text-light user-name mt-2">Teacher</h3>
        <ul class="navbar-nav d-flex flex-column mt-1 w-100" style="overflow-y: auto;">
            <li class="nav-item home-nav-btn" id="home">
                <a href="home.php" class="nav-link text-light px-4"><i class="bi bi-house-fill fs-2 text-white"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Home</span></a>
            </li>
            <li class="nav-item home-nav-btn" id="profile">
                <a href="userprofile.php" class="nav-link text-light px-4"><i class="bi bi-person-fill fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Profile</span></a>
            </li>
            <li class="nav-item home-nav-btn" id="payments">
                <a href="" class="nav-link text-light px-4"><i class="fa fa-clipboard-list fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Payments</span></a>
            </li>
            <li class="nav-item home-nav-btn" id="lessions">
                <a href="lessions.php" class="nav-link text-light px-4"><i class="bi bi-book-half fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Lessions</span></a>
            </li>
            <li class="nav-item home-nav-btn" id="assignments">
                <a href="assignments.php" class="nav-link text-light px-4"><i class="bi bi-files fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Assignments</span></a>
            </li>
            <li class="nav-item home-nav-btn" id="answersheets">
                <a href="answersheets.php" class="nav-link text-light px-4"><i class="bi bi-file-text fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Answersheets</span></a>
            </li>
            <li class="nav-item home-nav-btn" id="marks">
                <a href="marks.php" class="nav-link text-light px-4"><i class="bi bi-trophy-fill fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Marks</span></a>
            </li>
        <?php
    } else  if (isset($_SESSION["academic_officer"])) {
        ?>
            <h3 class="fs-5 text-light user-name mt-2">Academic Officer</h3>
            <ul class="navbar-nav d-flex flex-column mt-1 w-100" style="overflow-y: auto;">
                <li class="nav-item home-nav-btn" id="home">
                    <a href="home.php" class="nav-link text-light px-4"><i class="bi bi-house-fill fs-2 text-white"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Home</span></a>
                </li>
                <li class="nav-item home-nav-btn" id="profile">
                    <a href="userprofile.php" class="nav-link text-light px-4"><i class="bi bi-person-fill fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Profile</span></a>
                </li>
                <li class="nav-item home-nav-btn" id="payments">
                    <a href="" class="nav-link text-light px-4"><i class="fa fa-clipboard-list fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Payments</span></a>
                </li>
                <li class="nav-item home-nav-btn" id="manageStudents">
                    <a href="manageStudents.php" class="nav-link text-light px-4"><i class="bi bi-people-fill fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Students</span></a>
                </li>
                <li class="nav-item home-nav-btn" id="assignments">
                    <a href="assignments.php" class="nav-link text-light px-4"><i class="bi bi-files fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Assignments</span></a>
                </li>
                <li class="nav-item home-nav-btn" id="marks">
                    <a href="marks.php" class="nav-link text-light px-4"><i class="bi bi-trophy-fill fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Marks</span></a>
                </li>
            <?php
        }


        if (!isset($_SESSION["user"]) | !isset($_SESSION["teacher"]) | !isset($_SESSION["academic_officer"])) {
            ?>
                <li class="nav-item home-nav-btn">
                    <a class="nav-link text-light px-4" onclick="logOutConfirmation();"><i class="fa fa-arrow-right-from-bracket fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Log Out</span></a>
                </li>
            <?php
        } else {
            ?>
                <li class="nav-item home-nav-btn">
                    <a href="index.php" class="nav-link text-light px-4"><i class="bi bi-door-open-fill fs-2"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Go to Signin</span></a>
                </li>
            <?php
        }
            ?>
            </ul>