<?php include( "./header.inc.php" ); 

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
<body onload="getURL()">
<div  style="padding-left:10%">
<div  style="padding-right:10%">

<?php
    $wpid = $_GET["id"];
    $sql = "SELECT * FROM event ORDER BY date;";
    $result = mysqli_query($hoe, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
    while($row = mysqli_fetch_assoc($result)){
       if($wpid == $row['id']){
          echo "<br>";
          echo "<b>" . "<font size='6'>" . $row['title'] . "</font>" . "</b>" . "<br>" . "<br>";
          echo "Location: " . "<b>" . "<font size='3'>" . $row['location']  . "</b>" . "<br>" . "<br>";
          echo "Time: " . "<b>" . $row['time'] . "</b>" . "</font>" . "<br>" . "<br>";
          echo "Date: " . "<b>" . "<font size='4'>" . $row['date'] . "</b>" . "<br>" . "<br>";
          echo "<b>" . $row['body'] . "</b>" . "<br>" . "<br>";
          
         }
     }
     }
?>
<script type="text/javascript">
var capnum = 0;
function add(){
     capnum++;

     document.getElementById('display').innerHTML = capnum;
}
</script>
<button onclick="add()">I Am Attending</button>
<div id="display"><script type="text/javascript">document.write(capnum)
</script> 
</div>

   <p> The link is: <b><span id="pageLink"><script> document.write(window.location.href)</script></span></b></p>
   <button onclick="copyURL()">Copy Link</button> 
   <button onclick="window.print()">Print This Page</button>
</div>
</div>
</body>
</html>

		