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

<div  style="padding-left:10%">
<div  style="padding-right:10%">
<div class="container">
<h2><b> About the Project</h2>
<p> Digination is a Social Media Website that allows users to post events to help benefit the community, like protests, recycling events, or anything else.</b></p>
<a href="https://www.youtube.com/watch?v=b1bO3MTs_EY">Video Presentation of this website if you want to hear my voice</a>
<br>

<h2><b>Developer Resume</h2>
   <p>Education: </p>
   <p class="ex1">University of California, Riverside </b> Pursuing a B.S. in bioengineering <br>
<b>College of the Desert</b> Completed A.S. in Biology and Physics</p>
   <p><b>Work Experience:</b></p>
   <p class="ex1"><b>SI Leader/Tutor at College of the Desert</b> (June 2018 -  September 2019) <br> I lead a small math class to help freshmen or students with 
disabilities become acquainted with college. I also had open tutoring hours to help students of all ages succeed in their math and chemistry classes.
   <br><br><b>Intern for the Riverside County District Attorney Office </b> (June  2018 - August 2018) <br> I requested discovery, wrote motions, listened 
to jail calls, viewed body-worn cameras, audited continuing education courses, and observed trials.
   <br><br><b>Traffic Director for Truck Deliveries for Goldenvoice</b> (April 2018 - May 2018) <br> I routed the supply trucks and security companies for Coachellafest and Stagecoach 
to their appropriate areas in the fairgrounds.
   <br><br><b>Document Control for White&#39;s Steel</b> (June 2016 - August 2016) <br> I compiled and processed construction plans and documents from outside
 companies regarding steel required for various projects. </p>
<p><b>Extracurriculars:</b></p>
   <p class="ex1">UCR Biomedical Engineering Society <br>UCR Biochemistry Club <br>College of the Desert Chemistry Club <br> College of the Desert Biology Club
<br>College of the Desert Ecologic Club</p>
<p><b>Awards:</b></p>
   <p class="ex1">Best Health and Wellness Hack - 2020 (CitrusHack) <br>Citizen of the Year - 2016 (Palm Desert High School)
   <br>Senior of the Year - 2017 (Palm Desert High School) <br>Military Scholastic Award - 2017 (Palm Desert High School) <br>Dean&#39;s list (2017-2019) 
   <br>Perfect Attendance (2005-2017) 

</div>
</div>
</body>
</html>