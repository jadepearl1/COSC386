<!-- updatePassword.php will update a user's password-->
<?php

if (isset($_POST["signInButton"])) {

    // connect to database
    include "dbConnect.php";

    //get username (SU_Email)
    $username = $_POST["username"];

    //unmodified password
    $password = $_POST["password"];

    //hashed password, hash will change because of randomized salted string
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    //create sql string
    $sql = "UPDATE users SET passwordHash = '$hashed_password' WHERE SU_Email = '$username'";

    echo "<br />";
    echo $sql;

    //$connection is from dbConnect.php
    $result = mysqli_query($connection, $sql);

    if (!$result) {
        echo "Password update failure.";
    } else {
        echo "Updated";
    }

    mysqli_close($connection);
}
?>