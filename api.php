<?php

    require_once realpath(__DIR__ . "/vendor/autoload.php");
    use Dotenv\Dotenv;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    // Verwendung der Umgebungsvariablen
    $servername = $_ENV['DB_SERVER'];
    $username = $_ENV['DB_USERNAME'];
    $password = $_ENV['DB_PASSWORD'];
    $dbname = $_ENV['DB_NAME'];

    // Verbindung zur MySQL-Datenbank herstellen
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Restlicher Code zur Datenbankverarbeitung
