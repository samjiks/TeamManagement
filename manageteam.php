<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Revolutionary life - Living Stones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style>

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
  </head>
<body>
<?php 
include_once('dbconnect.php');
		
		$result = mysql_query("SELECT * FROM registration_table", $link);

		if (!$result) {
			die('Error: ' . mysql_error());
		}
		echo "<table class='table table-hover table-striped'><tr><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Age</th><th>Email Address</th><th>Team</th></tr>";
		
		while($row = mysql_fetch_array($result)){
				print "<tr><td>".$row['firstname']."</td><td>".$row['lastname']."</td><td>".$row['gender']."</td><td>".$row['age']."</td><td>".$row['emailaddress']."</td><td>".$row['team']."</td></tr>";	 
		} 
		
		mysql_close($link);
?>
</body>
</html>

