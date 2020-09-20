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

$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
   $name = $_POST['name'];
   $email = $_POST['email'];
   $message = $_POST['message'];

   if(empty($name) || empty($email) || empty($message) ){
      $status = "All fields are required";
   }
   else{
     if(strlen($name) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $name)) {
      $status = "Please enter a valid name";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $status = "Please enter a valid email";
    } else {
      $sql = "INSERT INTO contactinfo (name, email, message) VALUES (:name, :email, :message)";
      $stmt = $pdo->prepare($sql);
      $stmt->execute(['name' => $name, 'email' => $email, 'message' => $message]);
      $status = "YOUR MESSAGE WAS SENT";
      $name = "";
      $email = "";
      $message = "";
    }
  }
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Contact Us</title>
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
<div style="padding-left:10%;">
<div class="container">
      <h2>Contact Me Here</h2>
      <form action="" method="POST" class="main-form">
          <div class="form-group">
          <input type="text" size="96" placeholder="Full Name" name="name" id="name" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $name ?>">
          </div>
          <div class="form-group">
          <input type="text" size="96" placeholder="Email" name="email" id="email" class="gt-input"
          value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $email ?>">
          </div>
          <div class="form-group">
          <textarea placeholder="Your Message" name="message" id="message" cols="94" rows="10"
          class="gt-input gt-text"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $message ?></textarea>
          </div>
          <input type="submit" class="gt-button" value="Submit".
          <div class="form-status">
            <?php echo $status ?>
          </div>
      </form>
   </div>
</div>
</body>
</html>