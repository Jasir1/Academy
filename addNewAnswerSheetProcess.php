<?php

session_start();

require "connection.php";

$assignment_id = $_POST["assignment_id"];
$email = $_SESSION["student"]["email"];

if (empty($assignment_id)) {
    echo "Please select Assignment ID";
} 
else{
    $r = Database::search("SELECT * FROM `answersheet` WHERE `assignment_id`='".$assignment_id."'");
    $n = $r->num_rows;

    if ($n > 0){
        echo "Answer Sheet already submitted";
        //update...
    } else {
        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("Y-m-d H:i:s");
        
        Database::iud("INSERT INTO `answersheet` (`student_email`,`assignment_id`,`time_added`)
        VALUES('".$email."','".$assignment_id."','".$date."') ");

        echo "success";
    }
}

?>