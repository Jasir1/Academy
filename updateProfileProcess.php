<?php

require "connection.php";

session_start();

if (isset($_SESSION["student"]) | isset($_SESSION["teacher"]) | isset($_SESSION["academic_officer"])) {

    $user_email;
    if (isset($_SESSION["student"])) {
        $user_email = $_SESSION["student"]["email"];
    } else if (isset($_SESSION["teacher"])) {
        $user_email = $_SESSION["teacher"]["email"];
    } else if (isset($_SESSION["academic_officer"])) {
        $user_email = $_SESSION["academic_officer"]["email"];
    }
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $add1 = $_POST["add1"];
    $add2 = $_POST["add2"];
    $city = $_POST["city"];
    $pcode = $_POST["pcode"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];

    if (empty($username)) {
        echo "Please enter username.";
    } else if (empty($password)) {
        echo "Please enter password.";
    } else if (empty($mobile)) {
        echo "Please enter mobile.";
    } else if (empty($fname)) {
        echo "Please enter first name.";
    } else if (empty($lname)) {
        echo "Please enter last name.";
    } else if (empty($add1)) {
        echo "Please enter address.";
    } else if (empty($city)) {
        echo "Please select city.";
    } else {
        if (isset($_FILES["image"])) {
            $image = $_FILES["image"];
        }
        if (isset($image)) {

            $allowed_image_extention = array("image/jpg", "image/png", "image/jpeg", "image/svg");
            $fileExtention = $image["type"];

            if (!in_array($fileExtention, $allowed_image_extention)) {

                echo "Please select a valid image.";
            } else {

                $newImageExtention;
                if ($fileExtention == "image/jpg") {
                    $newImageExtention = ".jpg";
                } else if ($fileExtention == "image/png") {
                    $newImageExtention = ".png";
                } else if ($fileExtention == "image/jpeg") {
                    $newImageExtention = ".jpeg";
                } else if ($fileExtention == "image/svg") {
                    $newImageExtention = ".svg";
                }

                $fileName = "profile_images//" . uniqid() . $newImageExtention;
                move_uploaded_file($image["tmp_name"], $fileName);

                if (isset($_SESSION["student"])) {
                    $profile = Database::search("SELECT * FROM `student_profile_img` WHERE `user_email` = '" . $user_email . "' ");
                    $imageCount = $profile->num_rows;

                    if ($imageCount == 1) {
                        Database::iud("UPDATE `student_profile_img` SET `code`='" . $fileName . "' WHERE `user_email` = '" . $user_email . "'");
                        // echo "Profile Image updated successfully";
                        echo "success";
                    } else {
                        Database::iud("INSERT INTO `student_profile_img` (`code`,`user_email`) VALUES('" . $fileName . "','" . $user_email . "')");
                        // echo "New profile image saved Successfully.";
                        echo "success";
                    }
                } else if (isset($_SESSION["teacher"])) {
                    $profile = Database::search("SELECT * FROM `teacher_profile_img` WHERE `user_email` = '" . $user_email . "' ");
                    $imageCount = $profile->num_rows;

                    if ($imageCount == 1) {
                        Database::iud("UPDATE `teacher_profile_img` SET `code`='" . $fileName . "' WHERE `user_email` = '" . $user_email . "'");
                        // echo "Profile Image updated successfully";
                        echo "success";
                    } else {
                        Database::iud("INSERT INTO `teacher_profile_img` (`code`,`user_email`) VALUES('" . $fileName . "','" . $user_email . "')");
                        // echo "New profile image saved Successfully.";
                        echo "success";
                    }
                } else if (isset($_SESSION["academic_officer"])) {
                    $profile = Database::search("SELECT * FROM `profile_img` WHERE `user_email` = '" . $user_email . "' ");
                    $imageCount = $profile->num_rows;

                    if ($imageCount == 1) {
                        Database::iud("UPDATE `academic_officer_profile_img` SET `code`='" . $fileName . "' WHERE `user_email` = '" . $user_email . "'");
                        // echo "Profile Image updated successfully";
                        echo "success";
                    } else {
                        Database::iud("INSERT INTO `academic_officer_profile_img` (`code`,`user_email`) VALUES('" . $fileName . "','" . $user_email . "')");
                        // echo "New profile image saved Successfully.";
                        echo "success";
                    }
                }
            }
        } else {
            $user_email;
            if (isset($_SESSION["student"])) {
                Database::iud("UPDATE `student` SET `username`='" . $username . "',`password`='" . $password . "',`mobile`='" . $mobile . "',`first_name`='" . $fname . "',
            `last_name`='" . $lname . "', `add_line1`='" . $add1 . "', `add_line2`='" . $add2 . "',`city_id`='" . $city . "' WHERE `email`='" . $user_email . "'");
            } else if (isset($_SESSION["teacher"])) {
                Database::iud("UPDATE `teacher` SET `username`='" . $username . "',`password`='" . $password . "',`mobile`='" . $mobile . "',`first_name`='" . $fname . "',
            `last_name`='" . $lname . "', `add_line1`='" . $add1 . "', `add_line2`='" . $add2 . "',`city_id`='" . $city . "' WHERE `email`='" . $user_email . "'");
            } else if (isset($_SESSION["academic_officer"])) {
                Database::iud("UPDATE `academic_officer` SET `username`='" . $username . "',`password`='" . $password . "',`mobile`='" . $mobile . "',`first_name`='" . $fname . "',
            `last_name`='" . $lname . "', `add_line1`='" . $add1 . "', `add_line2`='" . $add2 . "',`city_id`='" . $city . "' WHERE `email`='" . $user_email . "'");
            }
            echo "success";
        }
    }
} else {
    echo "Error";
}
