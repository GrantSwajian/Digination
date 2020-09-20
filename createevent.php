<?php include( "./header.inc.php" ); ?>
<?php 

$dbHost = "localhost";
$dbUser = "130242";
$dbPassword = "Torpedo20073793";
$dbName = "130242";

try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  echo "DB Connection Failed: " . $e->getMessage();
}

$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $title = $_POST['title'];
  $location = $_POST['location'];
  $body = $_POST['body'];
  $date = $_POST['date'];
  $time = $_POST['time'];

  if(empty($title) || empty($location) || empty($body) || empty($date) || empty($time)) {
    $status = "All fields are required.";
  } else {
      $sql = "INSERT INTO event (title, location, body, date, time) VALUES (:title, :location, :body, :date, :time)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['title' => $title, 'location' => $location, 'body' => $body, 'date' => $date, 'time' => $time]);
      $status = "Your event was sent";
      $title = "";
      $locatio = "";
      $body = "";
      $date = "";
      $time = "";
    }
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
      <input type="text" placeholder="Search..." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</div>
<body onload="getURL()">
    <div style="padding-left:10%;">
    <div class="container">
    <h2>Create Event</h2>
    <form action="" method="POST" class="main-form">
      <div class="form-group">
        <input type="text" size="96" placeholder="Title" name="title" id="title" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $title ?>">
      </div>
      <div class="form-group">

      </div>
      <div class="form-group">    
        <input type="text" size="96" placeholder="Location (If the event is online, input link)" name="location" id="location" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $location ?>">
      </div>
      <div class="form-group">
        <textarea name="body"placeholder="Description" id="body" cols="94" rows="10"
          class="gt-input gt-text"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $body ?></textarea>
      </div>
      <div class="form-group">
        <label for="date">Date:</label>
        <input type="date" name="date" id="date"  class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $date ?>">
        <label for="time">Time:</label>
        <input type="time" name="time" id="time" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $time ?>">
      </div>
      <div class="form-group">
      <label for="type">Type of Event:</label>
  <datalist id="browsers">
        <option value= Competition>
        <option value= Conference>
        <option value= Concert>
        <option value= Festival>
        <option value= Networking>
        <option value= Party>
        <option value= Protest>
        <option value= Reunion>
        <option value= Seminar>
        <option value= Speaker>
        <option value= Sport>
        <option value= Tradeshow>
        <option value= Workshop>
        <option value= Other>
  </datalist>
<br>
      <input type="Submit" class="gt-button" value="Publish">
      <input type="reset" class="gt-button" value="Reset">
      <div class="form-status">
        <?php echo $status ?>
      </div>
    </form>

</body>
</html>							