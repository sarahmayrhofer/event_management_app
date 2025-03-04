<?php

    require_once realpath(__DIR__ . "/vendor/autoload.php");
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Using Environment Variables
    $servername = $_ENV['DB_SERVER'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $password = openssl_decrypt($password, 'aes-256-cbc', 'k4aUYD8RÄC9(I2apbkK|');
    $dbname = $_ENV['DB_NAME'];

    // Establish connection to MySQL database
    $conn = new mysqli($servername, $username, $password, $dbname);
