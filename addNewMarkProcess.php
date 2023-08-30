<?php

session_start();

require "connection.php";

$assignment_id = $_POST["assignment_id"];
$student_email = $_POST["student_email"];
$mark = $_POST["mark"];

if (empty($assignment_id)) {
    echo "Please select Assignment ID";
} 
else if (empty($student_email)) {
    echo "Please select Student Email";
} 
else if (empty($mark)) {
    echo "Please enter Mark";
}
else{
    $r = Database::search("SELECT * FROM `marks` WHERE `assignment_id`='".$assignment_id."' AND `student_email`='".$student_email."' ");
    $n = $r->num_rows;

    if ($n > 0){
        echo "Assignment mark already exists for this student";
    } else {
        
        Database::iud("INSERT INTO `marks` (`mark`,`assignment_id`,`student_email`)
        VALUES('".$mark."','".$assignment_id."','".$student_email."') ");

        echo "success";
    }
}

?>