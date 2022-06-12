<?php
    //Gets the requested session if it exists.
    session_start();

    if (isset($_SESSION[$_POST["requested"]])) {
        //Return session
        print json_encode($_SESSION[$_POST["requested"]]);
    } else {
        //Requested session not found, return null
        print json_encode(NULL);
    }
?>