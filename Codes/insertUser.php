<!-- insertUser will insert take information from $_POST and send it to DB as an insertion query-->
<?php
//TODO: Need session insertion here

if (isset($_POST["addToDbButton"])) {

    $id_number = $_POST['id_number'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $su_email = $_POST['su_email'];

    //user entry can't be blank or null
    if ($id_number != '' && $id_number != null) {

        // connect to database
        include "dbConnect.php";

        //generate insertion string, all attributes (columns) must have an entry
        $sql = "INSERT INTO users VALUES ('$id_number', '$first_name', '$last_name', '$su_email', '', '');";
        echo "<i>Your query sent to the database: " . $sql . "</i><br />"; //DEBUG line
        $result = mysqli_query($connection, $sql); //Returns 1 (true) if record inserted, false otherwise
        $rows = mysqli_affected_rows($connection); //Returns how many rows were inserted

        if ($result == 1) {
            //query was successful
            echo $rows . " record(s) inserted successfully." . '<br/>';
        } else {
            echo "<b>Record not inserted. Submission Error: </b>" . mysqli_error($connection);
        }

        mysqli_close($connection);

    } else {
        //user entered blank or null in input box
        echo "Primary Key (iD_Number) can't be blank or Null.";
    }
}
?>