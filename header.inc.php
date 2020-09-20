<!DOCTYPE html>
<html>
<head>
  <title>Digination</title>
    <script src="copylink.js"></script>
    <script src="getlink.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
* {box-sizing: border-box;}
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #FFB6C1;
}
.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 20px 20px;
  text-decoration: none;
  font-size: 17px;
}
.topnav a:hover {
  background-color: #ddd;
  color: black;
}
.topnav a.active {
  background-color: #add8e6;
  color: white;
}
.topnav .search-container {
  float: right;
}
.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}
.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}
.topnav .search-container button:hover {
  background: #ccc;
}
@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
</style>
<?
$reg = @$_POST['reg'];
//declaring variables to prevent errors
$ti = ""; //title
$lo = ""; //location
$bo = ""; //body
$ti = ""; //time
$d = ""; //date
//registration form
$ti = strip_tags(@$_POST['title']);
$lo = strip_tags(@$_POST['location']);
$bo = strip_tags(@$_POST['body']);
$t = strip_tags(@$_POST['time']);
$d = date("m-d-y"); 
?>
</head>
