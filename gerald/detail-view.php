<?php
    session_start();

    // Verbindung zur Datenbank herstellen (hier angenommen, dass XAMPP verwendet wird)
    $servername = "localhost";
    $username = "keycloak"; // Benutzername für Datenbank
    $password = "keycloak"; // Passwort für Datenbank
    $database = "keycloak"; // Name deiner Datenbank

    $conn = new mysqli($servername, $username, $password, $database);

    if(isset($_SESSION['id'])) { # Prüfen, ob der Benutzer eingeloggt ist
        if(str_contains(implode($_SESSION['roles']), 'Administrator')) { # Prüfen, ob "Administrator" zu den Rollen des Benutzers gehört
            $userIdParam = $_GET['userId']; // z. B. detail-view.php/?userId=48d38588-a80d-4845-85f7-0d11bb8a67c7
            if(strcmp($_SESSION['userId'], $userIdParam) == 0) { # Prüfen, ob die abgefragte Benutzer-ID mit dem eingeloggten Benutzer übereinstimmt
                $sql = "SELECT * FROM user_entity WHERE id=?";
                $statement = $mysqli->prepare($sql);
                $statement->execute([htmlspecialchars($userIdParam)]);
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailansicht</title>
</head>
<body>
    <!-- Titelleiste dynamisch einbinden -->
    <?php include 'header-bar.php' ?>
    <h1>Detailansicht</h1>
</body>
</html>