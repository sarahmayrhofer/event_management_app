<?php
// Verbindung zur Datenbank herstellen (hier angenommen, dass XAMPP verwendet wird)
$servername = "localhost";
$username = "root"; // Standard-Benutzername für XAMPP
$password = ""; // Standard-Passwort für XAMPP
$database = "meine_datenbank"; // Name deiner Datenbank

// Verbindung herstellen
$conn = new mysqli($servername, $username, $password, $database);

// Verbindung überprüfen
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}

// Formulardaten überprüfen und in die Datenbank einfügen
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anrede = $_POST["anrede"];
    $nachname = $_POST["nachname"];
    $vorname = $_POST["vorname"];
    $email = $_POST["email"];

    // SQL-Injektion vermeiden (hier nicht implementiert)
    $anrede = htmlspecialchars($anrede);
    $nachname = htmlspecialchars($nachname);
    $vorname = htmlspecialchars($vorname);
    $email = htmlspecialchars($email);

    // SQL-Befehl zum Einfügen der Daten
    $sql = "INSERT INTO benutzer (anrede, nachname, vorname, email) VALUES ('$anrede', '$nachname', '$vorname', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrierung erfolgreich.";
    } else {
        echo "Fehler beim Registrieren: " . $conn->error;
    }
}

// Datenbankverbindung schließen
$conn->close();
?>
