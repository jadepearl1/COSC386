<!-- verifyPassword.php -->
<?php
if (isset($_POST["signInButton"])) {

    // connect to database
    include "dbConnect.php";

    // log in variable
    $login = false;

    // get username (SU_Email)
    $username = $_POST["username"];

    // unmodified password
    $password = $_POST["password"];

    // create sql string
    $sql = "SELECT passwordHash FROM users WHERE SU_Email = '$username'";

    mysqli_fetch_array($result);

    // $connection is from dbConnect.php
    // if query is successful, $result will be a mysqli object with data
    $result = mysqli_query($connection, $sql);

    // number of rows should be 1; 0 indicates no user with that email; >1 means more than one
    // user with that email, which means DB is messed up
    $numRows = mysqli_num_rows($result);

    if ($numRows == 0) {
        echo "Invalid User Name";
    } else if ($numRows == 1) {
        //select the row (should be only one)
        $row = mysqli_fetch_array($result);

        //use built-in password_verify() function to check password
        if (password_verify($password, $row['passwordHash'])) {
            $login = true;
            echo "Login Successful";
        } else {
            echo "Invalid Password";
        }
    } else {
        echo "Database configuration error. Multiple entries returned";
    }

    mysqli_close($connection);
}