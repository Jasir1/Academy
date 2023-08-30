<?php

require "connection.php";

session_start();

if (isset($_SESSION["admin"])) {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];

    if (empty($password)) {
        echo "Please enter password.";
    } else if (empty($mobile)) {
        echo "Please enter mobile.";
    } else if (empty($fname)) {
        echo "Please enter first name.";
    } else if (empty($lname)) {
        echo "Please enter last name.";
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

                $profile = Database::search("SELECT * FROM `admin_profile_img` WHERE `admin_email` = '" . $_SESSION["admin"]["email"] . "' ");
                $imageCount = $profile->num_rows;

                if ($imageCount == 1) {
                    Database::iud("UPDATE `admin_profile_img` SET `code`='" . $fileName . "' WHERE `admin_email` = '" . $_SESSION["admin"]["email"] . "'");
                    // echo "Profile Image updated successfully";
                    echo "success";
                } else {
                    Database::iud("INSERT INTO `admin_profile_img` (`code`,`admin_email`) VALUES('" . $fileName . "','" . $_SESSION["admin"]["email"] . "')");
                    // echo "New profile image saved Successfully.";
                    echo "success";
                }
            }
        } else {
            Database::iud("UPDATE `admin` SET `password`='" . $password . "',`mobile`='" . $mobile . "',`first_name`='" . $fname . "',`last_name`='" . $lname . "' WHERE `email`='" . $_SESSION["admin"]["email"] . "'");
            echo "success";
        }
    }
} else {
    echo "Error";
}
