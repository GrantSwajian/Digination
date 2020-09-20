<?php include( "./header.inc.php" ); 

date_default_timezone_set('America/Los_Angeles');
$curr = date("Y-m-d");
$realtime = date("h:i:sa");

$dbHost = "localhost";
$dbUser = "189517";
$dbPassword = "Torpedo20073793";
$dbName = "189517";
$hoe = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  echo "DB Connection Failed: " . $e->getMessage();
}
?>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: "Lato", sans-serif;
}
.sidenav {
  width: 7%;
  position: fixed;
  z-index: 1;
  top: 60px;
  background: #FAFAD2;
  overflow-x: hidden;
  padding: 8px 0;
}
.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 16px;
  color: #2196F3;
  display: block;
}
.sidenav a:hover {
  color: #064579;
}
.main {
  margin-left: 140px; /* Same width as the sidebar + left position in px */
  font-size: 16px; /* Increased text to enable scrolling */
  padding: 0px 10px;
}
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 18px;}
  .sidenav a {font-size: 16px;}
}
</style>
</head>

<body style="background-color:	#FAFAD2;">

<div class="sidenav">
  <div  style="padding-left:18%">
  <p><big>Filter By </big></p>
  </div>
  <a href="http://grantswajian.orgfree.com/time.php">Soonest</a>
  <a href="http://grantswajian.orgfree.com/index.php">Amount Attending</a>
  <a href="http://grantswajian.orgfree.com/pastevents.php">Past Events</a>
</div>

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
<h2> UPCOMING EVENTS </h2>

<?php
    $sql = "SELECT * FROM event ORDER BY date;";
    $result = mysqli_query($hoe, $sql);
    $resultCheck = mysqli_num_rows($result);

    $new_time = DateTime::createFromFormat('h:i A', $realtime);
    $time_24 = $new_time->format('H:i:s');

    if ($resultCheck > 0) {
       while ($row = mysqli_fetch_assoc($result)){
          if($row['date']<$curr){
          }
          elseif($row['date']==$curr){

              if($row['time'] > $time_24){
                echo "<br>";
                echo '<a href="http://grantswajian.orgfree.com/shareevent.php?id='.$row["id"].'">';
                echo "<b>" . "<font size='5'>" . $row['title'] . "</font>" . "</b>" . "<br>"  . "</a>";
                echo "<b>" . "<font size='3'>" . $row['location']  . "</b>" . "&nbsp;";
                echo "at " . "<b>" . $row['time'] . "</b>" . "</font>" . "&nbsp;";
                echo "on " . "<b>" . "<font size='4'>" . $row['date'] . "</b>" . "<br>" ;
                echo $row['body'] . "<br>"  ;
          }
          }
          else{
          echo "<br>";
          echo '<a href="http://grantswajian.orgfree.com/shareevent.php?id='.$row["id"].'">';
          echo "<b>" . "<font size='5'>" . $row['title'] . "</font>" . "</b>" . "<br>" . "</a>";
          echo "<b>" . "<font size='3'>" . $row['location']  . "</b>" . "&nbsp;";
          echo "at " . "<b>" . $row['time'] . "</b>" . "</font>" . "&nbsp;";
          echo "on " . "<b>" . "<font size='4'>" . $row['date'] . "</b>" . "<br>" ;
          echo $row['body'] . "<br>" . "Amount Attending: " . "<b>" . $row['amount'] . "</b>" . "<br>";
          }
      }
   }

?>
</div>
</div>
</body>
</html>

		