<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Example</title>
    <style>
        /* Styles for the header */
        .header {
            display: flex; /* Use Flexbox layout */
            justify-content: space-around; /* Distribute items evenly */
            align-items: center; /* Align items vertically */
            background-color: #f0f0f0; /* Light background color */
            padding: 10px; /* Padding for spacing */
            width: 100%; /* Use full width of the screen */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }

        /* Style the links */
        .header a {
            text-decoration: none; /* Remove underline */
            color: #333; /* Text color */
            font-weight: bold; /* Make text bold */
            padding: 5px 10px; /* Padding around links */
        }

        /* Change link color on hover */
        .header a:hover {
            color: #007BFF; /* Blue color on hover */
        }
    </style>
</head>
<body>

<!-- Header using Flexbox -->
<div class="header"> <!-- Container for the header -->
    <a href='login.php'>Login</a>
    <a href='logout.php'>Logout</a>
    <a href='list-view.php'>Listenansicht</a>
    <a href='detail-view.php'>Meine Anmeldung</a>
</div>


</body>
</html>
