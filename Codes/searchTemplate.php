<html>
<body>
<?php
// Database configuration
if($connection=@mysqli_connect('localhost', 'jpearl2', 'jpearl2', 'GullCodeDB')){
    print '<p>Successfully connected to MySQL.</p>';
}

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve search query from user input
$search_query = $_POST['search_query'];

// SQL query to search for data in table
$sql = "SELECT * FROM TABLE_NAME WHERE TARGET_ATTR LIKE '%$search_query%'";

$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "PRIMARY_KEY: " . $row["PK_VALUE"]. " TARGET_ATTR: " . $row["ATTR_VALUE"]. "<br>";
    }
} else {
    echo "Unfortunately, no values match your search, please try a different key word/phrase!";
}

// Close connection
mysqli_close($conn);
?>
</body>
</html>
