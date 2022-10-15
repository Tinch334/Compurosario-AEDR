<?php
include "data.php";

    //We check that we got the username and password
    if(isset($_COOKIE["name"])) {
        echo "Welcome " . $_COOKIE["name"] . "<br />";
    }
?>