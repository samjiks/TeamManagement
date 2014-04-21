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

		$result = mysql_query("SELECT teamname FROM team_table", $link);
		

			if (!$result) {
				die('Error: ' . mysql_error());
			}
		
	
		
        print "<div class='container'>";
		while($row = mysql_fetch_array($result)){
		
			$result2 = mysql_query("Select firstname, lastname, age, team_id from registration_table where team_id IN (Select team_id from team_table where teamname = '".$row['teamname']."')", $link);
/* 
			$checkgender =  mysql_query("Select count(case when gender='male' then 1 end) as male_cnt, count(case when gender='female' then 1 end) as female_cnt, count(*) as total_cnt, team_id from registration_table where team_id IN (Select team_id from team_table where teamname = '".$row['teamname']."')", $link);
		
			if (!$checkgender) {
				die('Error: ' . mysql_error());
			}
			
			echo "Male". $checkgender['male_cnt'];
			echo "Female". $checkgender['female_cnt'];
			 */
			if (!$result2) {
				die('Error: ' . mysql_error());
			}
			
			$num = mysql_num_rows($result2);
			echo "<div class='row'>"; 
			echo "<b>".$row['teamname']."($num)"."</b>";
		

			while($rows = mysql_fetch_array($result2)){
			     print "<div class='col-sm-4' >";
				print $rows['firstname']." ".$rows['lastname']."(".$rows['age'].")";
				print "</div>";
			}		
			echo "</div>";
			
		} 
		
		print "</div>";
		
		
		
		mysql_close($link);
?>
</body>
</html>

