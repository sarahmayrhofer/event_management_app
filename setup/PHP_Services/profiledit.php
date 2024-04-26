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

// Überprüfen, ob das Formular gesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $email = $_POST["email"];

    // SQL-Injektion vermeiden (hier nicht implementiert, sollte später erfolgen)
    $vorname = htmlspecialchars($vorname);
    $nachname = htmlspecialchars($nachname);
    $email = htmlspecialchars($email);

    // SQL-Befehl zum Aktualisieren der Daten in der Datenbank
    $sql = "UPDATE benutzer SET vorname='$vorname', nachname='$nachname', email='$email' WHERE id=1"; // Hier 1 anpassen, je nachdem wie die Benutzer identifiziert werden

    if ($conn->query($sql) === TRUE) {
        echo "Änderungen erfolgreich gespeichert.";
    } else {
        echo "Fehler beim Speichern der Änderungen: " . $conn->error;
    }
}

// Datenbankverbindung schließen
$conn->close();
?>
