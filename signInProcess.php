<?php

session_start();

require "connection.php";

$email = $_POST["email"];
$password = $_POST["password"];
$rememberMe = $_POST["rememberMe"];
$acc_value = $_POST["acc_value"];

if (empty($acc_value)) {
    echo "Please select account type";
} else if (empty($email)) {
    echo "Please enter your Email Address";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please enter a valid Email Address";
} else if (empty($password)) {
    echo "Please enter your Password";
} else {
    if ($acc_value == "student") {
        $resultset =  Database::search("SELECT * FROM `student` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
        $count = $resultset->num_rows;

        if ($count == 1) {

            echo "success";
            $data = $resultset->fetch_assoc();
            $_SESSION["student"] = $data;

            if ($rememberMe == "true") {
                setcookie("email", $email, time() + (60 * 60 * 24 * 30 * 6));
                setcookie("password", $password, time() + (60 * 60 * 24 * 30 * 6));
            } else {
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo "Invalid Email or Password";
        }
    } else if ($acc_value == "teacher") {
        $resultset =  Database::search("SELECT * FROM `teacher` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
        $count = $resultset->num_rows;

        if ($count == 1) {

            echo "success";
            $data = $resultset->fetch_assoc();
            $_SESSION["teacher"] = $data;

            if ($rememberMe == "true") {
                setcookie("email", $email, time() + (60 * 60 * 24 * 30 * 6));
                setcookie("password", $password, time() + (60 * 60 * 24 * 30 * 6));
            } else {
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo "Invalid Email or Password";
        }
    } else if ($acc_value == "academic_officer") {
        $resultset =  Database::search("SELECT * FROM `academic_officer` WHERE `email`='" . $email . "' AND `password`='" . $password . "'");
        $count = $resultset->num_rows;

        if ($count == 1) {

            echo "success";
            $data = $resultset->fetch_assoc();
            $_SESSION["academic_officer"] = $data;

            if ($rememberMe == "true") {
                setcookie("email", $email, time() + (60 * 60 * 24 * 30 * 6));
                setcookie("password", $password, time() + (60 * 60 * 24 * 30 * 6));
            } else {
                setcookie("email", "", -1);
                setcookie("password", "", -1);
            }
        } else {
            echo "Invalid Email or Password";
        }
    }
}
