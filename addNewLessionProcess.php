<?php

session_start();

require "connection.php";

$lession_id = $_POST["lession_id"];
$lession_name = $_POST["lession_name"];
$subject = $_POST["subject"];
$email = $_SESSION["teacher"]["email"];

if (empty($lession_id)) {
    echo "Please enter Lession ID";
} 
else if (empty($lession_name)) {
    echo "Please enter Lession Name";
} 
else if (empty($subject)) {
    echo "Please select subject";
}
else{
    $r = Database::search("SELECT * FROM `lession` WHERE `id`='".$lession_id."'");
    $n = $r->num_rows;

    if ($n > 0){
        echo "Lession note already exists";
    } else {
        
        Database::iud("INSERT INTO `lession` (`id`,`name`,`subject_id`,`teacher_email`)
        VALUES('".$lession_id."','".$lession_name."','".$subject."','".$email."') ");

        echo "success";
    }
}

?>