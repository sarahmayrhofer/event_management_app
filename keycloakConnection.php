<?php

    require_once realpath(__DIR__ . "/vendor/autoload.php");

    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    use Jumbojett\OpenIDConnectClient;

    session_start(); // Also continues existing session

    $idProviderUrl = $_ENV['KEYCLOAK_SERVER'] . ':' . $_ENV['KEYCLOAK_PORT'] . $_ENV['KEYCLOAK_REALM_URL'];
    $clientId = $_ENV['KEYCLOAK_CLIENT_ID'];
    $clientSecret = $_ENV['KEYCLOAK_CLIENT_SECRET'];

    $oidc = new OpenIDConnectClient($idProviderUrl, $clientId, $clientSecret);