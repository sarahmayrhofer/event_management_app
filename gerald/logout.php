<?php
    require 'vendor/autoload.php';

    use Jumbojett\OpenIDConnectClient;

    session_start(); // Also continues existing session

    $idProviderUrl = 'localhost:8080/realms/demo-realm';
    $clientId = 'demo_client';
    $clientSecret = 'eSbmLe9GB3K7FUrMmeeHXVOg03W87Yy7';

    $oidc = new OpenIDConnectClient($idProviderUrl, $clientId, $clientSecret);

    if(isset($_SESSION['id'])) {
        $sessionId = $_SESSION['id'];
        session_destroy(); // immediately deletes session data

        $oidc->signOut($sessionId, 'https://localhost:443/keycloak-test/');
    }

    header('Location: ' . 'index.php'); // If we're already logged out, return to the main page.
