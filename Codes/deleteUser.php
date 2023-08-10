<!-- deleteUser will insert take information from $_POST and send it to DB as an deletion query-->
<?php
//TODO: Need session insertion here
if (isset($_POST["deleteUserButton"])) {

    $id_number = $_POST['id_number2'];

    //user entry can't be blank or null
    if ($id_number != '' && $id_number != null) {

        // connect to database
        include "dbConnect.php";

        //generate deletion string
        $sql = "DELETE FROM users WHERE users.iD_Number = '$id_number';";
        echo "<i>Your query sent to the database: " . $sql . "</i><br />"; //DEBUG line
        $rs = mysqli_query($connection, $sql); //Returns 1 if record inserted, false otherwise
        $rows = mysqli_affected_rows($connection); //Returns how many rows were deleted

        if ($rs == 1) {
            //query was successful
            if ($rows > 0) {
                echo '<br/>' . $rows . " record deleted successfully." . '<br/>';
            } else {
                //no rows deleted (record didn't exist as entered)
                echo "Query executed successfully, but 0 rows were deleted." . '<br/>';
            }
        } else {
            //query not successful
            echo "<b>Record not deleted. Submission Error:</b> " . mysqli_error($connection);
        }

        mysqli_close($connection);

    } else {
        //user entered blank or null in input box
        echo "<br>Primary Key (iD_Number) can't be blank or Null.";
    }
}
?>