<?php
    include 'keycloakConnection.php';

    if(isset($_SESSION['id'])) {
        $sessionId = $_SESSION['id'];
        session_destroy(); // immediately deletes session data

        $oidc->signOut($sessionId, 'https://localhost:443/eventmgr/gerald');
    }

    header('Location: ' . 'index.php'); // If we're already logged out, return to the main page.
