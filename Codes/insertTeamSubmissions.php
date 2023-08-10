<html>
<body>
<?php
if($connection=@mysqli_connect(’localhost’, ’username’, ’passwd’, 'GullCodeDB')){
    print ’<p>Successfully connected to MySQL.</p>’;
}

$sql = "INSERT INTO team_Submissions (teamName, year, challengeID, language, totalScore)
            VALUES (’$TeamName’, ’$Year, '$ChallengeID', ’$Language’, '$TotalScore')";

//Execute SQL Statement

$rs = mysqli_query($connection, $sql);

//Confirm that the data was inserted

if (mysqli_affected_rows($rs) == 1){
    echo "Record inserted successfully";
}

 mysqli_close($connection);
?>
</body>
</html>