<?php

/**
 * The function of ' session_destroy () ' destroys all information recorded in a session variable,
 *  then the: ' header ( 'Location: index.php') ' redirect the user to index.php
 */

    session_start();
    session_destroy();
    // header('location: index.php');
    mysql_close($connection);

?> 
