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
if (isset($_SESSION["admin"]["email"])) {

    $adminrs = Database::search("SELECT * FROM `admin` WHERE `email`='" . $_SESSION["admin"]["email"] . "'");
    $admin = $adminrs->fetch_assoc();

    $profileImage = Database::search("SELECT * FROM `admin_profile_img` WHERE `admin_email`='" . $_SESSION["admin"]["email"] . "'");
    $profile_num = $profileImage->num_rows;
    $profile = $profileImage->fetch_assoc();

    if ($profile_num > 0) {
?>
        <div class="row mt-1 home-nav-profile d-none d-lg-block">
            <div class="col-11 mx-auto d-flex justify-content-center">
                <div class="row shadow" style="width: 150px; height: 130px;">
                    <div class="col-12 mt-2 d-flex justify-content-center">
                        <img class="home-nav-profile-img rounded-circle" src="<?php echo $profile["code"] ?>" style="width: 60px; height: 60px;">
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <h3 class="fs-5 text-light user-name text-center"><?php echo $admin["first_name"] . " " . $admin["last_name"]; ?></h3>
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
                        <h3 class="fs-5 text-light user-name"><?php echo $admin["first_name"] . " " . $admin["last_name"]; ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="fs-5 text-light user-name mt-2">Admin</h3>
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
                    <h3 class="fs-5 text-light user-name">Admin</h3>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
<ul class="navbar-nav d-flex flex-column mt-1 mt-lg-4 w-100" style="overflow-y: auto;">

    <li class="nav-item home-nav-btn" id="dashboard">
        <a href="adminPanel.php" class="nav-link text-light px-4" style="height: 40px;"><i class="fa fa-dashboard fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Dashboard</span></a>
    </li>
    <li class="nav-item home-nav-btn" id="adminprofile">
        <a href="adminProfile.php" class="nav-link text-light px-4"><i class="bi bi-person-fill fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Profile</span></a>
    </li>
    <li class="nav-item home-nav-btn" id="manageStudents">
        <a href="manageStudents.php" class="nav-link text-light px-4"><i class="bi bi-people-fill fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Students</span></a>
    </li>
    <li class="nav-item home-nav-btn" id="manageTeachers">
        <a href="manageTeachers.php" class="nav-link text-light px-4"><i class="bi bi-people-fill fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Teachers</span></a>
    </li>
    <li class="nav-item home-nav-btn" id="manageAcademicOfficers">
        <a href="manageAcademicOfficers.php" class="nav-link text-light px-4"><i class="bi bi-people-fill fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Academic Officers</span></a>
    </li>
    <li class="nav-item home-nav-btn">
        <a class="nav-link text-light px-4" onclick="adminLogOutConfirmation();"><i class="fa fa-arrow-right-from-bracket fs-3"></i>&nbsp;&nbsp;<span class="fs-5 home-nav-label">Log Out</span></a>
    </li>

</ul>


<!-- <?php
        session_start();
        if (isset($_SESSION["admin"])) {
            $data = $_SESSION["admin"];
        ?>
    <?php echo $data["username"] ?>
<?php
        } else {
?>
    <a href="index.php">Sign In or Register</a>
<?php
        }
?> -->


<!-- <div class="modal" tabindex="-1" id="adminLogOutConfirmationModal">
    <div class="modal-dialog">
        <div class="modal-content my_div1" style="box-shadow: 0 15px 25px; border-radius: 10px;">
            <div class="modal-header border-0">
                <h5 class="modal-title fs-5 fw-bold">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <label class="warning_message" style="height: 60px;"></label>
                <br />
                <br />
                <label class="form-label fs-6">Do you want to logout?.</label>
            </div>
            <div class="modal-footer border-0">
                <a href="adminSignin.php" class="btn btn-secondary" onclick="logOut();">Ok</a>
            </div>
        </div>
    </div>
</div> -->