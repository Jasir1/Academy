<?php

require "connection.php";

session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Manage Students | Academy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <link rel="icon" href="resources/logo new.png" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="navigation.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body class="my_background1">

    <?php

    if (isset($_SESSION["admin"]["email"])) {

    ?>

        <nav class="navbar navbar-expand d-flex flex-column align-item-start shadow" id="sidebar">

            <?php require "adminNavigation.php"; ?>
            <script>
                var btn = document.getElementById('manageStudents');
                btn.style.backgroundColor = 'rgba(122, 118, 118, 0.5)';
            </script>

        </nav>
        <section class="p-4 my-container nav-body">
            <button class="btn text-white d-block d-lg-none" id="menu-btn"><i class="bi bi-arrow-right-square-fill fs-5 text-secondary"></i></button>

            <div class="row m-2 my_div">
                <div class="col-12 pt-4">
                    <h2 class="text-center text-white">Manage Students</h2>
                </div>

                <div class="col-11 mx-auto">
                    <div class="row g-3 justify-content-center">

                    </div>
                </div>

                <div class="col-11 mx-auto">
                    <div class="row mt-3 g-3 justify-content-center">
                        <div class="col-12 my_div1">
                            <div class="row">
                                <div class="col-12 col-md-8 col-lg-6 m-auto mt-5">
                                    <div class="row">
                                        <div class="input-group mb-3">
                                            <input type="text" placeholder="Search students here..." class="form-control" aria-label="Text input with dropdown button" id="student_search">
                                            <button class="btn btn-outline-primary" type="button" id="button-addon2"><img src="icons/search.png" class="search_icon" /></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-3">
                                <div class="col-11 mx-auto">
                                    <div class="row">
                                        <div class="col-5 mx-auto my_div rounded rounded-3 text-center">
                                            <?php

                                            $ActiveUserrs = Database::search("SELECT COUNT(`status_id`) AS `count` FROM `student` WHERE `status_id`='1' ");
                                            $ActiveUser = $ActiveUserrs->fetch_assoc();

                                            ?>
                                            <span class="text-white fw-bold fs-4">Active Students :</span>
                                            <span class="text-white fs-4"> <?php echo $ActiveUser["count"]; ?> </span>
                                        </div>
                                        <div class="col-5 mx-auto my_div rounded rounded-3 text-center">
                                            <?php

                                            $InactiveUserrs = Database::search("SELECT COUNT(`status_id`) AS `count` FROM `student` WHERE `status_id`='2' ");
                                            $InactiveUser = $InactiveUserrs->fetch_assoc();

                                            ?>
                                            <span class="text-white fw-bold fs-4">Inactive Students :</span>
                                            <span class="text-white fs-4"> <?php echo $InactiveUser["count"]; ?> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="hr1" />
                            </div>
                        </div>

                        <div class="col-12 mt-3 mb-3 my_div1">
                            <div class="row justify-content-center">

                                <div class="col-12 px-5 mt-3">
                                    <div class="row">
                                        <div class="col-2 col-lg-1 my_div rounded-3 border border-end py-2 text-end">
                                            <span class="fs-6 fw-bold text-white">#</span>
                                        </div>
                                        <div class="col-2 my_div border border-end rounded-3 py-2 d-none d-lg-block">
                                            <span class="fs-6 fw-bold text-dark">Profile Image</span>
                                        </div>
                                        <div class="col-3 col-lg-2 my_div border border-end rounded-3 py-2">
                                            <span class="fs-6 fw-bold text-white">Username</span>
                                        </div>
                                        <div class="col-3 col-lg-2 my_div border border-end rounded-3 py-2 d-lg-block">
                                            <span class="fs-6 fw-bold text-dark">Email</span>
                                        </div>
                                        <div class="col-2 my_div border border-end rounded-3 py-2 d-none d-lg-block">
                                            <span class="fs-6 fw-bold text-light">Mobile</span>
                                        </div>
                                        <div class="col-3 my_div border border-end rounded-3 py-2 d-none d-lg-block">
                                            <span class="fs-6 fw-bold text-dark">Registered Date</span>
                                        </div>
                                        <div class="col-4 col-lg-1 my_div border border-end rounded-3"></div>
                                    </div>
                                </div>

                                <?php

                                $page_no;

                                if (isset($_GET["page"])) {
                                    $page_no = $_GET["page"];
                                } else {
                                    $page_no = 1;
                                }

                                $user_rs = Database::search("SELECT * FROM `student` ");
                                $user_num = $user_rs->num_rows;

                                $results_per_page = 10;
                                $number_of_pages = ceil($user_num / $results_per_page);

                                $page_first_result = ((int)$page_no - 1) * $results_per_page;
                                $view_user_rs = Database::search("SELECT * FROM `student` LIMIT " . $results_per_page . " OFFSET " . $page_first_result . " ");

                                $view_results_num = $view_user_rs->num_rows;

                                $c = 0;

                                ?>


                                <?php

                                while ($user_data = $view_user_rs->fetch_assoc()) {
                                    $c = $c + 1;

                                ?>

                                    <div class="col-12 px-5 mt-2">
                                        <div class="row">
                                            <div class="col-2 col-lg-1 my_div border border-end rounded-3 py-2 text-end">
                                                <span class="fs-6 fw-bold text-white"><?php echo $c; ?></span>
                                            </div>
                                            <?php

                                            $image_rs = Database::search("SELECT * FROM `student_profile_img` WHERE `user_email`='" . $user_data["email"] . "'");
                                            $profile_num = $image_rs->num_rows;

                                            if ($profile_num > 0) {
                                                $image_data = $image_rs->fetch_assoc();
                                            ?>
                                                <div class="col-2 my_div border border-end rounded-3 py-2 d-none d-lg-block text-center">
                                                    <img src="<?php echo $image_data["code"]; ?>" style="width: 40px;" />
                                                </div>

                                            <?php
                                            } else {
                                            ?>
                                                <div class="col-2 my_div border border-end rounded-3 py-2 d-none d-lg-block text-center">
                                                    <img src="icons/user_default.png" style="width: 40px;" />
                                                </div>
                                            <?php
                                            }

                                            ?>

                                            <div class="col-3 col-lg-2 my_div border border-end rounded-3 py-2">
                                                <span class="fs-6 fw-bold text-white"><?php echo $user_data["username"]; ?></span>
                                            </div>
                                            <div class="col-3 col-lg-2 my_div border border-end rounded-3 py-2 d-lg-block">
                                                <span class="fs-6 fw-bold text-dark"><?php echo $user_data["email"]; ?></span>
                                            </div>
                                            <div class="col-2 my_div border border-end rounded-3 py-2 d-none d-lg-block">
                                                <span class="fs-6 fw-bold text-light"><?php echo $user_data["mobile"]; ?></span>
                                            </div>
                                            <div class="col-3 my_div border border-end rounded-3 py-2 d-none d-lg-block">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <span class="fs-6 fw-bold text-dark">
                                                            <?php $row = $user_data["register_date"];
                                                            $splited = explode(" ", $row);
                                                            echo $splited[0]; ?>
                                                        </span>
                                                    </div>
                                                    <div class="col-4 d-grid">
                                                        <?php

                                                        $s = $user_data["status_id"];
                                                        if ($s == "1") {
                                                        ?>
                                                            <button class="btn btn-danger" onclick="studentBlock('<?php echo $user_data['email']; ?>');">Block</button>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <button class="btn btn-success" onclick="studentBlock('<?php echo $user_data['email']; ?>');">Unblock</button>
                                                        <?php
                                                        }

                                                        ?>
                                                        <!-- <button class="btn btn-danger">Block</button> -->
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php

                                }
                                ?>

                                <div class="col-12 my-4 text-center">
                                    <div class="pagination">
                                        <a href="<?php if ($page_no <= 1) {
                                                        echo "#";
                                                    } else {
                                                        echo "?page=" . ($page_no - 1);
                                                    } ?>">&laquo;</a>

                                        <?php

                                        for ($page = 1; $page <= $number_of_pages; $page++) {
                                            if ($page == $page_no) {
                                        ?>
                                                <a href="<?php echo "?page=" . ($page); ?>" class="active"><?php echo $page; ?></a>
                                            <?php
                                            } else {
                                            ?>
                                                <a href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                        <?php
                                            }
                                        }

                                        ?>
                                        <a href="<?php if ($page_no >= $number_of_pages) {
                                                        echo "#";
                                                    } else {
                                                        echo "?page=" . ($page_no + 1);
                                                    } ?>">&raquo;</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-11 mx-auto">
                    <div class="row mb-3 g-3 justify-content-center">
                        <div class="col-12 my_div1">

                            <div class="row my-3">
                                <div class="col-11 mx-auto">
                                    <div class="row">
                                        <button class="col-5 mx-auto py-2 btn-primary rounded rounded-3 text-center" onclick="addStudentWindow();">
                                            <span class="text-white fw-bold fs-4 bi bi-person-plus-fill"></span>
                                            <span class="text-white fw-bold fs-4">Add Students</span>
                                        </button>

                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <hr class="hr1" />
                            </div>
                        </div>

                    </div>
                </div>

                <!-- add student modal -->
                <div class="modal" tabindex="-1" id="addStudentModal">
                    <div class="modal-dialog">
                        <div class="modal-content my_div1" style="box-shadow: 0 15px 25px; border-radius: 10px;">
                            <div class="modal-header border-0">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="col-12">
                                    <h5 class="modal-title fs-5 fw-bold">Add Student</h5>
                                    <span class="text-danger" id="error-msg1"></span>
                                </div>

                                <div class="col-12">
                                    <input class="inputbox1 text-dark" type="text" placeholder="Username" id="username" />
                                </div>

                                <div class="col-12 gy-3">
                                    <input class="inputbox1 text-dark" type="email" placeholder="Email" id="email" />
                                </div>

                                <div class="col-12 gy-3">
                                    <input class="inputbox1 text-dark" type="password" placeholder="Password" id="password" />
                                </div>

                                <div class="col-12 gy-3">
                                    <input class="inputbox1 text-dark" type="password" placeholder="Confirm Password" id="confirmpassword" />
                                </div>
                                <div class="col-12 gy-3">
                                    <input class="inputbox1 text-dark" type="number" placeholder="Mobile" id="mobile" />
                                </div>

                                <div class="col-12 gy-3">
                                    <select class="inputbox1 text-dark" id="gender">
                                        <?php

                                        $resultset = Database::search("SELECT * FROM `gender`");
                                        $count = $resultset->num_rows;

                                        for ($x = 0; $x < $count; $x++) {
                                            $data = $resultset->fetch_assoc();

                                        ?>

                                            <option value="<?php echo $data["id"]; ?>"><?php echo $data["name"]; ?></option>

                                        <?php
                                        }

                                        ?>
                                    </select>
                                </div>

                                <div class="col-12 gy-3">

                                    <div class="col-6 mt-3 mx-auto">
                                        <button class="col-12 btn-orange" onclick="addNewStudent();">Add student & Send verification</button>
                                    </div>
                                </div>
                                <div class="col-12"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- add student modal -->
            </div>

            <!-- success -->
            <div class="modal" tabindex="-1" id="newStudentAccountCreatedModal">
                <div class="modal-dialog">
                    <div class="modal-content my_div1" style="box-shadow: 0 15px 25px; border-radius: 10px;">
                        <div class="modal-header border-0">
                            <h5 class="modal-title fs-5 fw-bold">Success</h5>
                            <a href="manageStudents.php" class="btn-close"></a>
                        </div>
                        <div class="modal-body text-center">
                            <label class="success_message" style="height: 60px;"></label>
                            <br />
                            <label class="form-label fs-6">New student account created successfully.</label>
                        </div>
                        <div class="modal-footer border-0">
                            <a href="manageStudents.php" class="btn btn-secondary">Ok</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>


        <section class="p-4 my-container nav-body bg_footer text-white">
            <?php require "footer.php"; ?>
        </section>


        <!-- bootstrap js -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js" integrity="sha384-5h4UG+6GOuV9qXh6HqOLwZMY4mnLPraeTrjT5v07o347pj6IkfuoASuGBhfDsp3d" crossorigin="anonymous"></script>
        <script src="dashboard1.js"></script>
        <!-- custom js -->

        <script>
            var menu_btn = document.querySelector("#menu-btn")
            var sidebar = document.querySelector("#sidebar")
            var container = document.querySelector(".my-container")
            menu_btn.addEventListener("click", () => {
                sidebar.classList.toggle("navbar")
                container.classList.toggle("cont")
            })
        </script>


        <!-- logout -->
        <div class="modal" tabindex="-1" id="adminLogOutConfirmationModal">
            <div class="modal-dialog">
                <div class="modal-content my_div1" style="box-shadow: 0 15px 25px; border-radius: 10px;">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fs-5 fw-bold">Confirmation</h5>
                        <a href="manageStudents.php" class="btn-close"></a>
                    </div>
                    <div class="modal-body text-center">
                        <label class="warning_message" style="height: 60px;"></label>
                        <br />
                        <label class="form-label fs-6">Do you want to logout?.</label>
                    </div>
                    <div class="modal-footer border-0">
                        <a href="adminSignin.php" class="btn btn-secondary" onclick="logOut();">Ok</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
    <?php
    } else if (!isset($_SESSION["admin"]["email"])) {
    ?>

        <!-- warning -->
        <div class="modal" tabindex="-1" id="userErrorModal">
            <div class="modal-dialog">
                <div class="modal-content my_div1" style="box-shadow: 0 15px 25px; border-radius: 10px;">
                    <div class="modal-header border-0">
                        <h5 class="modal-title fs-5 fw-bold">Information</h5>
                        <a href="adminSignin.php" class="btn-close"></a>
                    </div>
                    <div class="modal-body text-center">
                        <label class="warning_message" style="height: 60px;"></label>
                        <br />
                        <label class="form-label fs-6">Please Sign In first.</label>
                    </div>
                    <div class="modal-footer border-0">
                        <a href="adminSignin.php" class="btn btn-secondary">Ok</a>
                    </div>
                </div>
            </div>
        </div>


        <script src="script.js"></script>
        <script src="bootstrap.bundle.js"></script>
        <script>
            var m = document.getElementById("userErrorModal");
            var svw = new bootstrap.Modal(m);
            svw.show();
        </script>
    <?php
    }
    ?>

</body>

</html>