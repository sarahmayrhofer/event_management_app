<?php
    header('Location: ' . '/eventmgr/gerald/detail-view.php'); // Redirect to the detail-view page by default and ignore everything else on this page.

    session_start(); // Also continues existing session();

    // react to button presses

    if(isset($_POST['buttonLogin'])) {
        doLogin();
    }

    if(isset($_POST['buttonLogout'])) {
        doLogout();
    }

    // set up necessary variables
    $loginDisabled = "";
    $logoutDisabled = "disabled";

    $msg = "You are not allowed to see this.";
    $roles = "You are not logged in.";

    if(isset($_SESSION['id'])) {
        $msg = "Welcome, authorized user " . $_SESSION['userId'];
        $loginDisabled = "disabled";
        $logoutDisabled = "";
        $roles = "Your roles: " . implode($_SESSION['roles']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
</head>
<body>
    <?php
        echo "<h1>" . $msg . "</h1>";
        echo "<p>" . $roles . "</p>";
    ?>

    <!-- https://www.geeksforgeeks.org/how-to-call-php-function-on-the-click-of-a-button/ -->
    <form method="post">
        <input type="submit" name="buttonLogin" class="button" value="Log in" <?php echo $loginDisabled; ?> />
        <input type="submit" name="buttonLogout" class="button" value="Log out" <?php echo $logoutDisabled; ?> />
    </form>
</body>
</html>

<?php
    function doLogin() {
        header('Location: ' . 'login.php');
    }

    function doLogout() {
        header('Location: ' . 'logout.php');
    }
?>