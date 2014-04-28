<?php 

include_once('dbconnect.php');

	function logerror($error){
	    $errorarray = array($error);
		
		echo "<ul>";
		foreach ($errorarray as $value){
			echo "<li class='alert'>".$value."</li>";
		}
		echo "</ul>";
	}

	$errorcheck = 0;
	if(isset($_POST['submit'])){
		$first_name = $_POST['firstname'];
		$last_name = $_POST['lastname'];
		$emailaddress = $_POST['emailaddress'];
		$age = $_POST['age'];
		$fathersname = $_POST['fathersname'];
		$fatherphonenumber = $_POST['fatherphonenumber'];
	
		
	if(empty($first_name)){
		$errorcheck = 1;
		$error = "Please insert First name";
		logerror($error);
	}
	
	if(empty($last_name)){
		$errorcheck = 1;
		$error = "Please insert Last name";
		logerror($error);
	}
	
	if(empty($_POST['gender'])) { 
		$errorcheck = 1;
		$error = "Please Select Gender";
		logerror($error);
	}
	

	if((empty($age)) ){
		$errorcheck = 1;
		$error = "Please insert the Age";
		logerror($error);
	}
	
	if(is_int($age)){
		$errorcheck = 1;
		$error = "Enter Age";
			      logerror($error);
	}
	
	
	$getemail = "Select emailaddress from registration_table";
	
	$resultsql = mysql_query($getemail, $link);
	
	if(mysql_num_rows($resultsql) > 0){
		while($row = mysql_fetch_assoc($resultsql)){
			if($row["emailaddress"] == $emailaddress){
				$error = "Email address already exists";
			    echo "<p class='alert'>$error</p>";
				exit;
			}
		}
	}
		$errorarray = array();
	

	
	function displayerror(){

	}
		if($errorcheck == 0){
			$sql="INSERT INTO registration_table (firstname, lastname, age, emailaddress, gender, assignedteam)
				VALUES
				( '$_POST[firstname]','$_POST[lastname]','$_POST[age]','$_POST[emailaddress]', '$_POST[gender]', '0')";

			if (!mysql_query($sql, $link)) {
			
				$error = mysql_error();
				logerror($error);
				exit;
			}
			echo '<p class="alert">You have successfully registered for Revolutionary Life</p>';
			exit;
			mysql_close($link);
		}
	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>REVELATION: THE REAL ENCOUNTER 2014</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">
	
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

  </head>

  <body>
    <div class="container" id="c_registration">
  <form action="create.php" method="post" >
    <div class="form-group">
      <label for="firstname" class="col-md-2">
        First Name:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" placeholder="Enter First Name">
      </div>
 
 
    </div>
 
    <div class="form-group">
      <label for="lastname" class="col-md-2">
        Last Name:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" placeholder="Enter Last Name">
      </div>
 
 
    </div>
 
    <div class="form-group">
      <label for="emailaddress" class="col-md-2">
        Email address:
      </label>
      <div class="col-md-10">
        <input type="email" class="form-control" id="emailaddress" name="emailaddress" value="<?php echo isset($_POST['emailaddress']) ? $_POST['emailaddress'] : '' ?>"  placeholder="Enter email address">
        <p class="help-block">
          Example: yourname@domain.com
        </p>
      </div>
 
 
    </div>
	
	<div class="form-group">
      <label for="age" class="col-md-2">
        Age:
      </label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="age" name="fathersname" value="<?php echo isset($_POST['fathersname']) ? $_POST['fathersname'] : '' ?>" placeholder="Enter Fathers Name">
      </div>
    </div>
    
	<div class="form-group">
      <label for="age" class="col-md-2">
        Father's name:
      </label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="fatherphonenumber" name="fatherphonenumber" value="<?php echo isset($_POST['fathersphonenumber']) ? $_POST['fatherphonenumber'] : '' ?>" placeholder="Enter Father's Phone number">
      </div>
    </div>
	
	<div class="form-group">
      <label for="age" class="col-md-2">
        Age:
      </label>
      <div class="col-md-4">
        <input type="text" class="form-control" id="age" name="age" value="<?php echo isset($_POST['age']) ? $_POST['age'] : '' ?>" placeholder="Enter the Age">
      </div>
    </div>
	
    <div class="form-group">
      <label for="Gender" class="col-md-2">
        Gender:
      </label>
      <div class="col-md-4">
        <label class="radio">
          <input type="radio" id="gender"  name="gender" value="male" checked>
          Male
        </label>
        <label class="radio">
          <input type="radio" id="gender" name="gender" value="female">
          Female
        </label>
      </div>
    </div>
     </div>

        <input type="submit" style="float: left;" name ="submit" class="btn btn-warning" value="Register">
        </button>
      </div>
    </div>
  </form>
  </div>
   </div>
 
    </div> 
  </body>
</html>
