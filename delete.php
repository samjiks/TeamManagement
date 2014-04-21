

<?php 
include_once('dbconnect.php');


     if(isset($_POST['delete'])) {
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
							echo "Congratulations! Record(s) selected have been successfully deleted \n";
						}	
					}
			}
			mysql_close($link);
			
		}
	

		if(isset($_POST['search'])){

		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$emailaddress = $_POST['emailaddress'];
		$emailaddress = trim ($emailaddress); 
		
	
		$searchfields = array($first_name, $last_name, trim($emailaddress));
    
		if(!array_filter($searchfields)) {
			echo '<p class="text-warning">Please enter a value into at least one of the fields regarding the request you are searching for.</p>';
		}else{

		$sql = "SELECT * FROM registration_table where emailaddress like '%".$emailaddress."%' AND firstname like '%".$first_name."%' AND  lastname like '%".$last_name."%'";

		$result = mysql_query($sql, $link);
	
	
		if (!$result) {
			die('Error: ' . mysql_error());
		}
		echo "<form action='delete.php' method='post'>";
		echo "<table class='table table-hover table-striped'><tr><th>Firstname</th><th>Lastname</th><th>Gender</th><th>Age</th><th>Email Address</th><th>Team</th><th>Update/Delete</th></tr>";
			
		while($row = mysql_fetch_array($result)){
	
			echo "<tr><td><input type='text' class='input-small' name='firstname' value='".$row['firstname']."'></td><td><input type='text' name='lastname' class='input-small' value='".$row['lastname']."'></input></td><td><input class='input-small' name='gender' type='text' value='".$row['gender']."'></input></td><td><input class='input-mini' type='text' name='age' value='".$row['age']."'></input></td><td><input class='input-large' name ='emailaddress' type='text' value='".$row['emailaddress']."'></input></td><td><input type='text' name='teamname' class='input-small' disabled value=''></td><td><input type='checkbox' id='".$row['User_id']."' name='checkbox".$row['User_id']."' ></td><td><input type='hidden' class='input-small' name='id[]' value='".$row['User_id']."'></td></tr>";	 
		} 
		echo "<div class='container-fluid' id='styles' style='float: right'>";
		echo "<input type='submit'  style='float: right; padding: 10px;' name='delete' id='delete' class='btn btn-danger' disabled style='float: right' value='Delete'>";	
		echo "<input type='checkbox' name='enable' id='enable' value='Enable Delete' style='float: right; padding: 10px;' >";
		echo "Enable Delete Button";
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
      <b>  DELETE FORM - SEARCH BY </b>
      </label>
  <form action="delete.php" method="post" >
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
