<?php
    // Redirect to the login page by default.
    // Source: https://stackoverflow.com/a/768472
    header('Location: ' . 'login.php');
    die(); // Stop the PHP processor in case the receiver does not respect the header.