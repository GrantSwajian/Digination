<?php include( "./header.inc.php" ); 

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
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}
.main {
  margin-left: 140px; /* Same width as the sidebar + left position in px */
  font-size: 16px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}
</style>
</head>

<body style="background-color:	#FAFAD2;">

<div class="topnav">
  <a class="active" href="http://grantswajian.orgfree.com">Home</a>
  <a class="active" href="http://grantswajian.orgfree.com/createevent.php">Create Event</a>
  <a class="active" href="http://grantswajian.orgfree.com/about.php">About</a>
  <a class="active" href="http://grantswajian.orgfree.com/contact.php">Contact</a>
  <div class="search-container">
    <form action="phpSearchOption.php" method="post">
       <input type="text" placeholder="Search..." name="search">
        <button type="submit"><i class="fa fa-search"></i></button>
        <br>
        <select name="column">
	<option value="title">Title</option>
	<option value="location">Location</option>
	<option value="eventtype">Type of Event</option>
	</select><br>
    </form>
  </div>
</div>

<div  style="padding-left:10%">
<div  style="padding-right:10%">
<div class="container">
<h2> Search Results </h2>

<?php

$sql = "select * from event where $column like '%$search%'";

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

$conn->close();

?>