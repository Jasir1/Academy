<?php

session_start();

if(isset($_SESSION["student"])){

    $_SESSION["student"] = null;
    session_destroy();
    echo "success";
}
if(isset($_SESSION["teacher"])){

    $_SESSION["teacher"] = null;
    session_destroy();
    echo "success";
}
if(isset($_SESSION["academic_officer"])){

    $_SESSION["academic_officer"] = null;
    session_destroy();
    echo "success";
}

?>