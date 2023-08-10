<html>
<body>
<?php
// database credentials and establish connection
if($connection=@mysqli_connect('localhost', 'jpearl2', 'jpearl2', 'GullCodeDB')){
    print '<p>Successfully connected to MySQL.</p>';
}

// define the CSV file path
$csv_file = "test.csv";
//if the CSV file is in the same directory as the php file, you can also use
//$csv_file = filename.csv

// open the CSV file
$file_handle = fopen($csv_file, "r");

// loop through the CSV file and insert data into the table
while (!feof($file_handle)) {
  // read the CSV data
  $csv_data = fgetcsv($file_handle);

  // insert the CSV data into the database
  $sql = "INSERT INTO users (iD_Number, firstName, lastName, SU_Email, passwordHash, profilePic) VALUES ('$csv_data[0]', '$csv_data[1]', '$csv_data[2]', '$csv_data[3]', '$csv_data[4]', '$csv_data[5]')";
  mysqli_query($connection, $sql);
}

// close the CSV file
fclose($file_handle);

// close the database connection
mysqli_close($connection);
?>
</body>
</html>