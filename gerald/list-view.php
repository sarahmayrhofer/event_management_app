<?php
    session_start();

    // Verbindung zur Datenbank herstellen (hier angenommen, dass XAMPP verwendet wird)
    $servername = "localhost";
    $username = "keycloak"; // Benutzername für XAMPP
    $password = "keycloak"; // Passwort für XAMPP
    $database = "keycloak"; // Name deiner Datenbank

    $conn = new mysqli($servername, $username, $password, $database);

    if(isset($_SESSION['id'])) { # Prüfen, ob der Benutzer eingeloggt ist
        if(str_contains(implode($_SESSION['roles']), 'Administrator')) { # Prüfen, ob "Administrator" zu den Rollen des Benutzers gehört

        }
    }

    $sql = "SELECT * FROM user_entity";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listenansicht</title>
</head>
<body>
    <!-- Titelleiste dynamisch einbinden -->
    <?php include 'header-bar.php' ?>
    <h1>Listenansicht</h1>
    <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"]. " - Name: " . $row["name"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    ?>
</body>
</html>