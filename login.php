<?php
    include 'keycloakConnection.php';

    if($oidc->authenticate()) {
        $helloMsg = 'Hello ' . $oidc->requestUserInfo('email') . '!';

        // Apparently, this is how you do it, as there doesn't seem to be a way to verify the id token without going via the login.
        // Src: https://stackoverflow.com/a/4860797
        $_SESSION['id'] = $oidc->getIdToken();
        session_regenerate_id(true); // good practice

        $_SESSION['userId'] = $oidc->requestUserInfo('sub');
        $_SESSION['roles'] = $oidc->requestUserInfo('roles');
        $_SESSION['given_name'] = $oidc->requestUserInfo('given_name');
        $_SESSION['preferred_username'] = $oidc->requestUserInfo('preferred_username');

        if(str_contains(implode($_SESSION['roles']), 'Administrator')) { # Prüfen, ob "Administrator" zu den Rollen des Benutzers gehört
            header('Location: ' . 'list-view.php');
        } else {
            header('Location: ' . 'detail-view.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
</head>
<body>
    <h1>Something went wrong.</h1>
</body>
</html>