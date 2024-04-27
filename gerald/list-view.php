<?php
    session_start();

    // Verbindung zur Datenbank herstellen (hier angenommen, dass XAMPP verwendet wird)
    //$servername = "localhost";
    //$username = "keycloak"; // Benutzername für XAMPP
    //$password = "keycloak"; // Passwort für XAMPP
    //$database = "keycloak"; // Name deiner Datenbank

    //$conn = new mysqli($servername, $username, $password, $database);

    include 'api.php';

    $isAdmin = false;
    if(isset($_SESSION['id'])) { # Prüfen, ob der Benutzer eingeloggt ist
        if(str_contains(implode($_SESSION['roles']), 'Administrator')) { # Prüfen, ob "Administrator" zu den Rollen des Benutzers gehört
            $isAdmin = true;
        }
    }

    echo $servername;
    echo $username;
    echo $password;
    echo $dbname;
    $sql = "SELECT * FROM booking";
    $result = $conn->query($sql);
    echo $sql;
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
        if ($isAdmin) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "User ID: ";
                    echo "<a href='detail-view.php?user_id=" . $row["user_id"] . "'>";
                    echo $row["user_id"];
                    echo "</a> - No. of Participants: ";
                    echo $row["no_participants"];
                    echo " - Last Updated: ";
                    echo $row["last_updated"];
                    echo "<br>";
                }
            } else {
                echo "0 results";
            }
        } else {
            echo "Sie sind nicht berechtigt, diese Seite zu sehen.";
        }
    ?>
</body>
</html>