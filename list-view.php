<?php
    session_start();

    require 'api.php';

    $isAdmin = false;
    if(isset($_SESSION['id'])) { # Check if the user is logged in
        if(in_array("Administrator", $_SESSION['roles'])) { # Check if "Administrator" is among the user's roles
            $isAdmin = true;
        }
    } else { # If the user is not logged in:
        header('Location: ' . 'login.php'); # Redirect to login page
        die(); // Stop the PHP processor in case the receiver does not respect the header.
    }

    $sql = "SELECT * FROM booking";
    $result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bookings</title>
</head>
<body>
    <!-- Dynamically include header bar -->
    <?php include 'header-bar.php' ?>
    <h1>All Bookings</h1>
    <?php
        if ($isAdmin) {
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "User ID: ";
                    echo "<a href='detail-view.php?user_id=" . htmlspecialchars($row["user_id"]) . "'>";
                    echo htmlspecialchars($row["user_id"]);
                    echo "</a> - User name: ";
                    echo htmlspecialchars($row['user_name']);
                    echo " -  No. of Participants: ";
                    echo htmlspecialchars($row["no_participants"]);
                    echo " - Last Updated: ";
                    echo htmlspecialchars($row["last_updated"]);
                    echo "<br>";
                }
            } else {
                echo "0 results";
            }
        } else {
            echo "You do not have permission to access this.";
        }
    ?>
</body>
</html>