<?php
    session_start();

    // Establish a connection to the database
    //$servername = "localhost";
    //$username = "keycloak"; // Database username
    //$password = "keycloak"; // Database password
    //$database = "keycloak"; // Database name

    //$conn = new mysqli($servername, $username, $password, $database);

    include 'api.php';

    // Check for database connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $userName = "Guest"; // Default name for non-authenticated users
    $isAdmin = false; // Default assumption is that the user is not an admin
    $currentParticipants = 1; // Default value if there's no booking

    if (isset($_SESSION['userId'])) { // Check if the user is logged in
        $userId = $_SESSION['userId']; // Retrieve the user ID from the session

        $userName=$_SESSION['preferred_username']; // <--------------------------------------------------------------------------------
        /*                                                                                                                            |
         * GERALD: Please don't access the user_entity table directly from the application logic. If you need any info from Keycloak, |
         * it should be queried in login.php and stored in the session info. Do this -------------------------------------------------|
         * instead.
         * NOTE: In my humble opinion, i'd prefer to showthe user name, instead of the given name of the user. However, if you strongly disagree, I've also saved the first name as 'given_name'.
         * BTW: For more info on the information we can get from Keycloak, kindly see https://openid.net/specs/openid-connect-core-1_0.html#StandardClaims
        */
        // Fetch the user's details from the database
        /*$sql = "SELECT first_name FROM user_entity WHERE id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $userId); // Bind the user ID to the prepared statement
            $stmt->execute(); // Execute the query
            $result = $stmt->get_result(); // Get the result set

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); // Fetch the user data
                $userName = $row['first_name']; // Get the user's first name
            }

            $stmt->close(); // Close the prepared statement
        }*/

        // Check if the logged-in user is an administrator
        if (isset($_SESSION['roles']) && in_array("Administrator", $_SESSION['roles'])) {
            $isAdmin = true; // The user is an administrator
        }

        // GERALD: This, on the other hand, is perfectly fine, as the booking table belongs to our application, not Keycloak.
        // Fetch the booking information to get the current number of participants
        $sql = "SELECT no_participants FROM booking WHERE user_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("s", $userId); // Bind the user ID
            $stmt->execute(); // Execute the query
            $result = $stmt->get_result(); // Get the result set

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc(); // Fetch the booking data
                $currentParticipants = $row['no_participants']; // Get the current number of participants
            }

            $stmt->close(); // Close the prepared statement
        }
    }

    $conn->close(); // Close the database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>
    
    <style>
        /* Center the content horizontally and vertically */
        .centered-content {
            display: flex; /* Use Flexbox layout */
            flex-direction: column; /* Stack elements vertically */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            height: 100vh; /* Full viewport height */
            text-align: center; /* Center text horizontally */
        }

        /* Add spacing between elements */
        .centered-content > * {
            margin: 10px; /* Add margin between elements */
        }
    </style>
</head>
<body>
    <!-- Include the header bar -->
    <?php include 'header-bar.php'; ?>

    <div class="centered-content"> <!-- Centered content container -->
        <!-- Admin-specific greeting -->
        <?php if ($isAdmin): ?>
            <h1>Welcome, Admin! This is <?php echo htmlspecialchars($userName); ?>'s profile.</h1>
        <?php else: ?>
            <h1>Welcome, <?php echo htmlspecialchars($userName); ?>!</h1>
        <?php endif; ?>

        <!-- Page content -->
        <h2>Greetings and thank you for wanting to join our awesome event on the 11th of May! Just tell us how many friends you are bringing along we can plan accordingly.</h2>

        <!-- Form for booking with prefilled value -->
        <form action="" method="post"> <!-- Form to submit the number of participants -->
            <label for="no_participants">Number of Participants:</label>
            <input type="number" name="no_participants" id="no_participants" min="1" required value="<?php echo htmlspecialchars($currentParticipants); ?>"> <!-- Prefill with the current value -->
            <button type="submit">Book</button>
        </form>
    </div>
</body>
</html>
