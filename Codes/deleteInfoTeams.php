<html>
<body>
<?php
if($connection=@mysqli_connect(’localhost’, ’username’, ’passwd’, ’GullCodeDB’)){
    print ’<p>Successfully connected to MySQL.</p>’;
}
    // optional error checking
    if(! $connection ) {
        die(’Could not connect: ’ . mysqli_error());
    }
    
    echo ’Connected successfully<br>’;
    
    $sql = ’DELETE FROM teams WHERE = ’;
    
    if (mysqli_query($connection, $sql)) {
        echo "Record deleted successfully";
    }

    mysqli_close($connection);
?>
</body>
</html>
