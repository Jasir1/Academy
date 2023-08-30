<?php

session_start();

require "connection.php";

$assignment_id = $_POST["assignment_id"];
$assignment_name = $_POST["assignment_name"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];
$subject = $_POST["subject"];
$email = $_SESSION["teacher"]["email"];

if (empty($assignment_id)) {
    echo "Please enter Assignment ID";
} 
else if (empty($assignment_name)) {
    echo "Please enter Assignment Name";
} 
else if (empty($start_date)) {
    echo "Please enter start date";
}
else if (empty($end_date)) {
    echo "Please enter end date";
}
else if (empty($subject)) {
    echo "Please enter subject";
}
else{
    $r = Database::search("SELECT * FROM `assignment` WHERE `id`='".$assignment_id."'");
    $n = $r->num_rows;

    if ($n > 0){
        echo "Assignment already exists";
    } else {
        
        Database::iud("INSERT INTO `assignment` (`id`,`name`,`subject_id`,`teacher_email`,`start_date`,`end_date`,`submit_type_id`)
        VALUES('".$assignment_id."','".$assignment_name."','".$subject."','".$email."','".$start_date."','".$end_date."','2') ");

        echo "success";
    }
}

?>