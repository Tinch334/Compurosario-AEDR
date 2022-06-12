<?php
    //Gets the requested session if it exists.
    session_start();

    //We delete all session tokens
    session_destroy();

    //Take user to main page.
    header("Location: /TRES/index.html");
?>