<?php
    session_start();

    require 'api.php';

    $isAdmin = false;
    if(isset($_SESSION['id'])) { # Prüfen, ob der Benutzer eingeloggt ist
        if(in_array("Administrator", $_SESSION['roles'])) { # Prüfen, ob "Administrator" zu den Rollen des Benutzers gehört
            $isAdmin = true;
        }
    } else { # Wenn der Benutzer nicht eingeloggt ist:
        header('Location: ' . 'login.php'); # Auf die Login-Seite weiterleiten.
    }

    $sql = "SELECT * FROM booking";
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
        if ($isAdmin) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "User ID: <a href='detail-view.php?user_id=" . $row["user_id"] . "'>" . $row["user_id"] . "</a> - User name: " . $row['user_name'] . " -  No. of Participants: " . $row["no_participants"]. " - Last Updated: " . $row["last_updated"]. "<br>";
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