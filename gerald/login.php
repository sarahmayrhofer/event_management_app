<?php
    require 'vendor/autoload.php';

    use Jumbojett\OpenIDConnectClient;

    session_start(); // Also continues existing session

    $idProviderUrl = 'localhost:8080/realms/demo-realm';
    $clientId = 'demo_client';
    $clientSecret = 'eSbmLe9GB3K7FUrMmeeHXVOg03W87Yy7';

    $oidc = new OpenIDConnectClient($idProviderUrl, $clientId, $clientSecret);

    if($oidc->authenticate()) {
        $helloMsg = 'Hello ' . $oidc->requestUserInfo('email') . '!';

        // Apparently, this is how you do it, as there doesn't seem to be a way to verify the id token without going via the login.
        // Src: https://stackoverflow.com/a/4860797
        $_SESSION['id'] = $oidc->getIdToken();
        session_regenerate_id(true); // good practice

        header('Location: ' . 'index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keycloak Test</title>
</head>
<body>
    <h1>Something went wrong.</h1>
</body>
</html>