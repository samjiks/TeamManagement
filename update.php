<? session_start();

echo "Welcome, " . $_SESSION["username"];
?>

<?php 
include_once('dbconnect.php');



	if (isset($_POST['update'])) {
	
	   $size = count($_POST['firstname']);
	   $size = count($_POST['lastname']);
	   $size = count($_POST['emailaddress']);
	   $size = count($_POST['age']);
	   $size = count($_POST['gender']);

	   $i = 0;
	
	   $checked = 0;
	  while($i < $size){
	  $firstname = $_POST['firstname'][$i];
	  $lastname = $_POST['lastname'][$i]; 
	  $emailaddress = $_POST['emailaddress'][$i];
	  $age = $_POST['age'][$i];
	  $gender = $_POST['gender'][$i];
	  $id = $_POST['id'][$i];
	 
			
		        $sql = "UPDATE registration_table SET firstname = '$firstname', lastname = '$lastname', emailaddress = '$emailaddress', age = '$age', gender = '$gender' WHERE User_id = '$id'";
			    $result = mysql_query($sql, $link) or die ("Error in query: $sql".mysql_error()); 
			    echo "<p class='alert'>Congratulations!".$firstname.",Your record have been successfully updated</p>";
		
				  //  $sql = "UPDATE registration_table SET firstname = '$_POST['firstname'][$i]', lastname = '$_POST['lastname'][$i]', emailaddress = '$_POST['emailaddress'][$i]', age = '$_POST['age'][$i]', gender = '$_POST['gender'][$i]'";
			
			 ++$i;
			 
	   }
	 //  $first_name = $_POST['firstname'];
	 //  $last_name = $_POST['lastname']; 
	  // $emailaddress = $_POST['emailaddress'];
	 //  $age = $_POST['age'];
	  // $gender = $_POST['gender'];
	   
	   

	/* 			$checked = 0;
				foreach  ($_POST['checkbox'] as $id){
					$checked = 1;
				  echo $id;
				if($checked == 1){
				    $sql = "UPDATE registration_table SET firstname = '$first_name', lastname = '$last_name', emailaddress = '$emailaddress', age = '$age', gender = '$gender' WHERE User_id = '$id'";
					 echo "Congratulations!".$first_name.",Your record have been successfully updated";
				}else{
				    $sql = "UPDATE registration_table SET firstname = '$first_name', lastname = '$last_name', emailaddress = '$emailaddress', age = '$age', gender = '$gender'";
				}
				
				$retval = mysql_query( $sql, $link );
				
				if(! $retval ){
					die('Could not update data: ' . mysql_error());
				}
				}
				 */

		        mysql_close($link);
			   
	}else if(isset($_POST['delete'])) {
	    $first_name = $_POST['firstname'];
	    $last_name = $_POST['lastname']; 
	    $emailaddress = $_POST['emailaddress'];
	    $age = $_POST['age'];
	    $gender = $_POST['gender'];
		
			rundeletes($first_name, $last_name, $emailaddress, $age, $gender);
	
	}
	
	
		function rundeletes($first_name, $last_name, $emailaddress, $age, $gender){
			Global $link;
	
			foreach($_POST['id'] as $id){
				$checked = 0;
				
			if($checked = 0){
				echo "Nothing Selected";
				exit;
			}
			
			if(isset($_POST["checkbox".$id])){
				$checked = 1;
			}
			
			if($checked ==1){
					$sql = "DELETE FROM registration_table WHERE User_id = '$id' ";
		
					$retval = mysql_query($sql, $link);
									
						if(! $retval ){
							die('Could not delete data: ' . mysql_error());
						}else{				
							echo "<p class='alert'>Congratulations! Record(s) selected have been successfully deleted \n</p>";
						}	
					}
			}
			mysql_close($link);
			
		}
		
		function runupdates($first_name, $last_name, $emailaddress, $age, $gender, $link) {
	
			
		}

		if(isset($_POST['search'])){

		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$emailaddress = $_POST['emailaddress'];
		$emailaddress = trim ($emailaddress); 
		
	
		$searchfields = array($first_name, $last_name, trim($emailaddress));
    
		if(!array_filter($searchfields)) {
			echo '<p class="alert">Please enter a value into at least one of the fields regarding the request you are searching for.</p>';
		}else{

		$sql = "SELECT * FROM registration_table where emailaddress like '%".$emailaddress."%' AND firstname like '%".$first_name."%' AND  lastname like '%".$last_name."%'";

		$result = mysql_query($sql, $link);
	
	
		if (!$result) {
			die('Error: ' . mysql_error());
		}
		echo "<form action='update.php' method='post'>";
		echo "<table class='table table-hover table-striped'><tr><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Age</th><th>Email Address</th><th>Team</th></tr>";
			
		while($row = mysql_fetch_array($result)){
		  echo "<tr><td><input type='text' class='input-small' name='firstname[]' value='".$row['firstname']."'></td><td><input type='text' name='lastname[]' class='input-small' value='".$row['lastname']."'></input></td><td><input class='input-small' name='gender[]' type='text' value='".$row['gender']."'></input></td><td><input class='input-mini' type='text' name='age[]' value='".$row['age']."'></input></td><td><input class='input-large' name ='emailaddress[]' type='text' value='".$row['emailaddress']."'></input></td><td><input type='text' name='teamname[]' class='input-small' disabled value=''></td><td><input type='hidden' class='input-small' name='id[]' value='".$row['User_id']."'></td></tr>";	 
		} 
		echo "<div class='container-fluid' id='styles' style='float: right'>";
		echo "<input type='submit'  name='update' class='btn btn-warning' style='float: right; padding: 10px;' value='Update'>";
		echo "</div>";
        echo "</form>";  
		
		$anymatches=mysql_num_rows($result); 

		if ($anymatches == 0)  { 
			echo "<p class='alert'>Sorry, but we can not find an entry to match your query</p>"; 
		} 		
				
		mysql_close($link);
	}
	//$sql="UPDATE registration_table SET Age=36 WHERE firstname='$first_name' AND lastname='$last_name' AND emailaddress='$emailaddress'";

	// if (!mysql_query($sql, $link)) {
		// die('Error: ' . mysql_error());
	// }
	// echo '<script>alert("Succesfully updated")</script>';
	// mysql_close($link);
}

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
	<script src="js/jquery-2.1.0.min.js"></script>

    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<script>
	$(document).ready(function(){
		$('#enable').click(function() {
		if (!$(this).is(':checked')) {
	    $( "#delete" ).prop( "disabled", true );
		}else{
			$("#delete").prop( "disabled", false );
	    }
   	});
	});
	
	</script>
	

  </head>

  <body>
    <div class="container" id="c_registration">
		<label for="firstname" class="col-md-2">
      <b>  UPDATE FORM - SEARCH BY </b>
      </label>
  <form action="update.php" method="post" >
    <div class="form-group">
      <label for="firstname" class="col-md-2">
       <b> First Name: </b>
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
      </div>
 
 
    </div>
	
 	<label for="or" class="col-md-2">
       <b> Or </b>
      </label>
    <div class="form-group">
      <label for="lastname" class="col-md-2">
       <b> Last Name: </b>
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Enter Last Name">
      </div>
 
 
    </div>
		<label for="or" class="col-md-2">
		 <b> Or </b>
      </label>
 
    <div class="form-group">
      <label for="emailaddress" class="col-md-2">
        <b>  Email address: </b>
      </label>
      <div class="col-md-10">
        <input type="email" class="form-control" id="emailaddress" name="emailaddress"  placeholder="Enter email address">
        <p class="help-block">
          Example: yourname@domain.com
        </p>
      </div>
  
        <input type="submit"  name ="search" class="btn btn-info" value="Search">
        </button>

  </form>
  </div>
   </div>
 
    </div> 

  </body>
</html>
