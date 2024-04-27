<?php
    include 'keycloakConnection.php';

    if($oidc->authenticate()) {
        // Apparently, this is how you do it, as there doesn't seem to be a way to verify the id token without going via the login.
        // Src: https://stackoverflow.com/a/4860797
        $_SESSION['id'] = $oidc->getIdToken();
        session_regenerate_id(true); // good practice

        $_SESSION['userId'] = $oidc->requestUserInfo('sub');
        $_SESSION['roles'] = $oidc->requestUserInfo('roles');
        $_SESSION['given_name'] = $oidc->requestUserInfo('given_name');
        $_SESSION['preferred_username'] = $oidc->requestUserInfo('preferred_username');

        if(in_array("Administrator", $_SESSION['roles'])) { # Prüfen, ob "Administrator" zu den Rollen des Benutzers gehört
            header('Location: ' . 'list-view.php');
        } else {
            header('Location: ' . 'detail-view.php?user_id=' . htmlspecialchars($_SESSION['userId']));
        }
    }

    die(); // Stop the PHP processor in case the receiver does not respect the header.
