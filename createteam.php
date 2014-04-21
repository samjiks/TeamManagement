<? session_start();

echo "Welcome, " . $_SESSION["username"];
?>

<?php 
include_once('dbconnect.php');

		if(isset($_POST['submit'])){
			$getteamname = $_POST['createteam'];
		
			$registerteamquery = "Insert into team_table (teamname) values ('$getteamname')";
		
			if (!mysql_query($registerteamquery, $link)) {
				die('Error: ' . mysql_error());
			}
	
			echo '<script>alert("You have successfully created a team")</script>';
		} 
		
		if(isset($_POST['delete'])){
		   $deleteteam = $_POST['deleteteam'];
		   
			if($_POST['deleteteam'] == "Select"){
			
			   echo "Can't use Select to delete";
			   exit;
			   
			}else{
			
		
				$sql1 = "UPDATE registration_table SET team_id=NULL, assignedteam = 0 where team_id IN (Select team_id from team_table where teamname = '$deleteteam')";
				$update = mysql_query($sql1, $link);
				
				if(! $update){
					die ('Updating issues for users with team:' . mysql_error());
					exit;
				}
				
				$sql = "DELETE FROM team_table WHERE teamname = '$deleteteam' ";
				$retval = mysql_query($sql, $link);
				
				
				if(! $retval ){
					die('Could not delete team: ' . mysql_error());
					exit;
				}	
				
				echo "Congratulations! Team have been successfully deleted \n.  Please reassign your users to the correct team!";
			}
	
		}
		
		$result = mysql_query("SELECT * FROM team_table", $link);

		if (!$result) {
			die('Error: ' . mysql_error());
		}
		
		echo "<form action='createteam.php' method='post' >";
		echo "<label for='deleteteam' class='col-md-2'>
         Delete Team : </label>";
		echo "<select name='deleteteam'>";
		echo "<option>Select</option>";
		while($row = mysql_fetch_array($result)){
				print "<option>".$row['teamname']."</option>";	 
		}
		echo "</select>";
		echo "</br>";
		echo "<input type='submit' name ='delete' class='btn btn-info' value='Delete'>";
		echo "</form>";
		
		mysql_close($link);
?>

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
	  <hr>

 <form action="createteam.php" method="post" >
    <div class="form-group">
      <label for="firstname" class="col-md-2">
       Create Team :
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="createteam" name="createteam" placeholder="Register New Team">
      </div>
	 </div>
	  <div class="col-md-2">
			<input type="submit"  name ="submit" class="btn btn-info" value="Register">

	  </form>



</body>
</html>

