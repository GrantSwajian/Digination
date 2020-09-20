<?php include( "./header.inc.php" ); ?>
<?php 
$curr = date("Y-m-d");
$times=strtotime("- 10hours");
$realtime = date("h:i:sa", $times);
$dbHost = "localhost";
$dbUser = "130242";
$dbPassword = "Torpedo20073793";
$dbName = "130242";
$hoe = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);
try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  echo "DB Connection Failed: " . $e->getMessage();
}
?>

<body style="background-color:	#FAFAD2;">
<div class="topnav">
  <a class="active" href="http://grantswajian.freevar.com">Home</a>
  <a class="active" href="http://grantswajian.freevar.com/createevent.php">Create Event</a>
  <a class="active" href="http://grantswajian.freevar.com/about.php">About</a>
  <a class="active" href="http://grantswajian.freevar.com/contact.php">Contact</a>
  <div class="search-container">
    <form action="/action_page.php">
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<body onload="getURL()">
<div  style="padding-left:10%">
<div  style="padding-right:10%">
<?php
    $wpid = $_GET["id"];
    $sql = "SELECT * FROM event ORDER BY date;";
    $result = mysqli_query($hoe, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
    while ($row = mysqli_fetch_assoc($result)){
        if ($wpid == $row['id']) {
          echo "<br>";
          echo "<b>" . "<font size='6'>" . $row['title'] . "</font>" . "</b>" . "<br>" . "<br>";
          echo "Location: " . "<b>" . "<font size='3'>" . $row['location']  . "</b>" . "<br>" . "<br>";
          echo "Time: " . "<b>" . $row['time'] . "</b>" . "</font>" . "<br>" . "<br>";
          echo "Date: " . "<b>" . "<font size='4'>" . $row['date'] . "</b>" . "<br>" . "<br>";
          echo "<b>" . $row['body'] . "</b>" . "<br>";
        }
    }
    }
?>
        <p>The link is: <b><span id="pageLink"></span></b></p> 
        <button onclick="copyURL()">Copy Link</button>
        <button onclick="window.print()">Print This Page</button> 
</div>
</body>
</html>
	