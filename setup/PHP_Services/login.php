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
    $username = $_POST["username"];
    $password = $_POST["password"];

    // SQL-Injektion vermeiden (hier nicht implementiert, sollte aber später erfolgen)
    $username = htmlspecialchars($username);
    $password = htmlspecialchars($password);

    // Passwort mit einem Hash vergleichen (in einem echten System sollte das Passwort gehasht sein und in der Datenbank gespeichert werden)
    $sql = "SELECT * FROM benutzer WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login erfolgreich
        echo "Login erfolgreich.";
        // Hier könnte die Weiterleitung auf eine andere Seite durchführen
    } else {
        // Login fehlgeschlagen
        echo "Falscher Benutzername oder Passwort.";
    }
}

// Datenbankverbindung schließen
$conn->close();
?>
