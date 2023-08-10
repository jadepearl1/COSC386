<!-- This file can be included for database connection.  Disconnection is not included here -->
<?php
$db_host = "localhost";
$db_user = "jschmidt9";
$db_pass = "jschmidt9";
$db_name = "GullCodeDB";

// set connection variable to connect to the database.
if ($connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name)) {
    echo '<p>Successfully connected to MySQL.</p>'; //DEBUG
}

// optional error checking
if (mysqli_connect_error()) {
    echo 'Connection Error: ' . mysqli_connect_error();
    exit();
}
?>