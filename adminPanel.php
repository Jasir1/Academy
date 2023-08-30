<?php

session_start();

require "connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Dashboard | Academy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">


    <link rel="icon" href="resources/logo new.png" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="navigation.css">
</head>

<body class="my_background1">

    <?php
    if (isset($_SESSION["admin"])) {

    ?>

        <nav class="navbar navbar-expand d-flex flex-column align-item-start shadow" id="sidebar">

            <?php require "adminNavigation.php"; ?>
            <script>
                var btn = document.getElementById('dashboard');
                btn.style.backgroundColor = 'rgba(122, 118, 118, 0.5)';
            </script>

        </nav>
        <section class="p-4 my-container nav-body">
            <button class="btn text-white d-block d-lg-none" id="menu-btn"><i class="bi bi-arrow-right-square-fill fs-5 text-secondary"></i></button>

            <div class="row m-2 my_div">
                <div class="col-12 pt-4">
                    <h2 class="text-center text-white">Dashboard</h2>
                </div>
                <!-- home content -->


                <!------------------ first div ------------------->
                <div class="col-11 mt-3 mx-auto">
                    <div class="row my_div1">

                        <div class="col-12 mt-3 mx-auto">
                            <div class="row g-3 justify-content-center">

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row mb-2 my_background">

                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Monthly Income</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">LKR 175,000</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">

                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Monthly Outgoing</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">LKR 125,000</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 my_div text-center">
                                    <div class="row my_background">

                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Annual Income</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">LKR 2550,000</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 my-3 mx-auto">
                                    <div class="row g-3 justify-content-center">
                                        <div class="col-12 col-md-5 col-lg-4 col-xl-3 ms-3 me-3 my_div text-center">
                                            <div class="row mb-2 my_background">

                                                <div class="col-3">
                                                    <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                                </div>
                                                <div class="col-9">
                                                    <label class="form-label text-end fs-4 fw-bold">Annual Outgoing</label>
                                                    <br />
                                                    <span class="text-white fs-5 col-7">LKR 1550,000</span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!------------------ second div ------------------->

                <div class="col-11 mt-3 mx-auto">
                    <div class="row mb-3 my_div1">

                        <div class="col-12 mt-3 mx-auto">
                            <div class="row g-3 mb-3 justify-content-center">

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">
                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Students</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">30</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">

                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Teachers</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">10</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">
                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Academic Officers</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">5</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">
                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">FeesCollection</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">5</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">
                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Subjects</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">5</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">
                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Assignments</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">5</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">
                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Lession Notes</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">5</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">
                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Answer Sheets</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">5</span>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-5 col-lg-4 col-xl-3 me-md-3 my_div text-center">
                                    <div class="row my_background">
                                        <div class="col-3">
                                            <i class="fa-solid fa-box fs-1 mt-3 text-light col-5"></i>
                                        </div>
                                        <div class="col-9">
                                            <label class="form-label text-end fs-4 fw-bold">Exam Results</label>
                                            <br />
                                            <span class="text-white fs-5 col-7">5</span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            <!-- </div> -->
            <!-- </div> -->

            <!-- =============================================== -->
            <!-- Home content -->
        </section>


        <section class="p-4 my-container nav-body bg_footer text-white">
            <?php require "footer.php"; ?>
        </section>
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
                        <a href="adminPanel.php" class="btn-close"></a>
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