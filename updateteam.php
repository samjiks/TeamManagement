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
    <script src="js/jquery-2.1.0.min.js"></script>

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
	<script type="text/javascript">
/* $.ajax({
		type: 'POST',
		url: 'assignteam.php',
		data: formData,
		dataType: 'json',
		success: function( resp ){
        alert( resp );
		}
 });
	$(document).ready(function(){
	$( '#formid' ).submit( function(){
	var formData = $( this ).serialize();
	//	alert(formData);
	});   
}); */
	// $(document).ready(function(){
	// $.getJSON( "revolutionary%20life/assignteam.php", function( data ) {
		// var items = [];
		// $.each( data, function( key, val ) {
		
		// $( "<ul/>", {
    // "class": "my-new-list",
    // html: items.join( "" )
		// }).appendTo( "body" );
	// });
	</script>
  </head>
  
<body/* >
<?php 
/*
include_once('dbconnect.php');

//print_r($_POST);
$teamsql = mysql_query("SELECT * FROM team_table", $link);

		$array=array();
		
		if (!$teamsql) {
			die('Error: ' . mysql_error());
		}
		
		while ($teamrow = mysql_fetch_array($teamsql)){
				$array[] = $teamrow;
	}
		json_encode($teamrow);
	echo "<form action='assignteam.php' id='formid' method='post'>";
	echo "<input type='text' class='input-small' name='ids'>";
	echo "<select class='input-medium' name ='teamname' id='teamname'><option>Select</option>";
	foreach ($array as $value){
	echo "<option class='input-large' onchange='document.getElementById('selected_text').value=this.options[this.selectedIndex].text' value=".$value['team_id'].">".$value['teamname']."</option>";
	}
	echo "</select>";
	echo "<input type='submit'  name='update' class='btn btn-warning' style='float: right' value='Update'>";
    echo "</form>";  
	mysql_close($link);
*/
?> 

<?php 
include_once('dbconnect.php');

	
	if (isset($_POST['update'])) {

			foreach ($_POST['id'] as $id){
				$teamname = $_POST['teamname'.$id];
				$getteamid = mysql_query("SELECT team_id FROM team_table where teamname='$teamname'", $link);
				
					if (!$getteamid) {
						die('Error: ' . mysql_error());
					}
					
				while ($teamid = mysql_fetch_array($getteamid)){
						$teamid = $teamid['team_id'];
				        $insertteamid = mysql_query("UPDATE registration_table SET team_id= '$teamid', assignedteam=1 where User_id='$id'");
						
						if (!$insertteamid) {
							die('Error: ' . mysql_error());
						}				
				}
			}
		
	}

		$result = mysql_query("SELECT * FROM registration_table where assignedteam=1", $link);
		$teamsql = mysql_query("SELECT * FROM team_table", $link);

		$array=array();
		
		if (!$result) {
			die('Error: ' . mysql_error());
		}
		
		while ($teamrow = mysql_fetch_array($teamsql)){
				$array[] = $teamrow;
			
		}
	
		echo "<form action='updateteam.php' method='post'>";
		echo "<table class='table table-hover table-striped'><tr><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Age</th><th>Email Address</th><th>Assign Team</th></tr>";
		
	
		
		while($row = mysql_fetch_array($result)){
				

				echo "<tr><td class='input-micro'>".$row['firstname']."</td><td class='input-micro'>".$row['lastname']."</td><td class='input-micro'>".$row['gender']."</td><td class='input-micro'>".$row['age']."</td><td class='input-large'>".$row['emailaddress']."</td><td><select class='input-medium' name ='teamname".$row['User_id']."'><option>Select</option>"; 
				foreach ($array as $value){
		
				echo "<option class='input-large' onchange='document.getElementById('selected_text').value=this.options[this.selectedIndex].text' value=".$value['teamname'].">".$value['teamname']."</option>";
				}
				echo "</select></td>";	 
			    echo "<td><input type='hidden' class='input-small' name='id[]' value='".$row['User_id']."'></td><td><input type='hidden' class='input-small' name='selected_text' id='selected_text' value=''></td></tr>";
				
		} 
		echo "<input type='submit'  name='update' class='btn btn-warning' style='float: right' value='Update'>";
   
        echo "</form>";  
		
		mysql_close($link);
 ?>
</body>
</html>

