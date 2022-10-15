<?php
    //Gets the requested session if it exists.
    session_start();

    //We delete all session tokens
    session_destroy();
?>