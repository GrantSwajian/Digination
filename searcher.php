<?//php include( "./header.inc.php" ); 

$search = $_POST['search'];
$column = $_POST['column'];

$dbHost = "localhost";
$dbUser = "189517";
$dbPassword = "Torpedo20073793";
$dbName = "189517";

$conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

if ($conn->connect_error){
	die("Connection failed: ". $conn->connect_error);
}

$sql = "select * from event where title like '%$search%'";

$result = $conn->query($sql);

if ($result->num_rows > 0){
while($row = $result->fetch_assoc() ){
	        echo "<br>";
                echo '<a href="http://grantswajian.orgfree.com/shareevent.php?id='.$row["id"].'">';
                echo "<b>" . "<font size='5'>" . $row['title'] . "</font>" . "</b>" . "<br>"  . "</a>";
                echo "<b>" . "<font size='3'>" . $row['location']  . "</b>" . "&nbsp;";
                echo "at " . "<b>" . $row['time'] . "</b>" . "</font>" . "&nbsp;";
                echo "on " . "<b>" . "<font size='4'>" . $row['date'] . "</b>" . "<br>" ;
                echo $row['body'] . "<br>"  ;
}
} else {
	echo "0 records";
}
