<?php
// This is a work in progress to get the upload button to work properly (to upload a CSV file)
// The proof of concept for parsing the data is already verfied
//TODO: Need session insertion here


$uploadOk = 1;
$target_file = $_FILES["userFile"]["name"];
$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if (isset($_POST["databaseUpload"])) {
    if ($filetype == "csv" || $filetype == "txt") {
        $uploadOk = 1;
    } else {
        echo "File is not a .csv or .txt file type.";
        $uploadOk = 0;
    }
}


// database credentials and establish connection
if ($connection = @mysqli_connect('localhost', 'jschmidt9', 'jschmidt9', 'GullCodeDB')) {
    echo '<p>Successfully connected to MySQL.</p>';
} else {
    //exit script if connection error
    die(mysqli_error($connection));
}

// define the CSV file path
$csv_file = "test.csv";
//if the CSV file is in the same directory as the php file, you can also use
//$csv_file = filename.csv

// open the CSV file
$file_handle = fopen($csv_file, "r");

$rows = 0; //keeps track of modified rows
$errorArray = array();

// loop through the CSV file and insert data into the table
while (!feof($file_handle)) {
    // read the CSV data line up to new line character
    $csv_data = fgetcsv($file_handle);

    // insert the CSV data into the database
    $sql = "INSERT INTO users (iD_Number, firstName, lastName, SU_Email, passwordHash, profilePic) VALUES ('$csv_data[0]', '$csv_data[1]', '$csv_data[2]', '$csv_data[3]', '', '')";
    $rs = mysqli_query($connection, $sql); //Returns 1 (true) if record inserted, false otherwise

    if ($rs == 1) {
        // //query was successful
        // echo $rows . " record(s) inserted successfully." . '<br/>';
        $rows++;
    } else {
        //save error message in array for printing
        $errorArray[count($errorArray)] = mysqli_error($connection);
    }
    //print results
    echo $rows . " record(s) inserted successfully." . '<br/>';
    echo count($errorArray) . " error messages:." . '<br/>';
    //print each error message
    foreach ($errorArray as $msg) {
        echo '<i>' . $msg . '</i><br/>';
    }
}

// close the CSV file
fclose($file_handle);

// close the database connection
mysqli_close($connection);
?>