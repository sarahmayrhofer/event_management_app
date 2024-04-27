<?php
    include 'keycloakConnection.php';

    if(isset($_SESSION['id'])) {
        $sessionId = $_SESSION['id'];
        session_destroy(); // immediately deletes session data

        $oidc->signOut($sessionId, 'https://localhost:443/eventmgr/detail-view.php');
    }

    header('Location: ' . 'detail-view.php'); // If we're already logged out, also return to the detail view.
    die(); // Stop the PHP processor in case the receiver does not respect the header.
