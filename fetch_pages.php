<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Revolutionary life - Living Stones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">

	<link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<script src="js/jquery-2.1.0.min.js"></script>
	<body>
<?php
require("dbconnect.php"); //include config file

$item_per_page = $_POST["item_per_page"];
//sanitize post value
$page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);

//validate page number is really numaric
if(!is_numeric($page_number)){die('Invalid page number!');}

//get current starting point of records
$position = ($page_number * $item_per_page);

//Limit our results within a specified range. 
$results = mysql_query("SELECT * FROM registration_table r LEFT JOIN team_table t ON r.team_id = t.team_id order by assignedteam DESC LIMIT $position, $item_per_page", $link);

//output results from database
	$array = array();
 
      echo "<div id='results'>";

     echo "<table class='table table-hover table-striped'><tr><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Age</th><th>Email Address</th><th>Team</th></tr>";
		
		while($row = mysql_fetch_array($results)){
		       $array[] = $row;
			   print "<tr><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['gender']."</td><td>".$row['age']."</td><td>".$row['emailaddress']."</td><td>".$row['teamname']."</td></tr>";	 
  
		} 
	  echo "</table>";
	  echo "</div>";
?>
</body>
</html>