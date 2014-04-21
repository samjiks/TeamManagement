<?php 

include_once('dbconnect.php');

if(isset($_POST['submit'])){
    $first_name = $_POST['firstname'];
    $last_name = $_POST['lastname'];
	$emailaddress = $_POST['emailaddress'];
	$age = $_POST['age'];
//	$teamname = $_POST['teamname'];
	
	if (isset($_POST['gender'])) { 
	}
	
	$sql="INSERT INTO registration_table (FirstName, LastName, age, emailaddress, gender)
			VALUES
		( '$_POST[firstname]','$_POST[lastname]','$_POST[age]','$_POST[emailaddress]', '$_POST[gender]')";

	if (!mysql_query($sql, $link)) {
		die('Error: ' . mysql_error());
	}
	echo '<script>alert("You have successfully registered for Revolutionary Life")</script>';
	
	mysql_close($link);
	exit;
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
    <style>
      body {
        padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
      }
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

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Revolutionary life</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="registration.php">Registration</a></li>
              <li><a href="about.php">About us</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container" id="c_registration">


 
  <form action="registration.php" method="post" >
    <div class="form-group">
      <label for="firstname" class="col-md-2">
        First Name:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter First Name">
      </div>
 
 
    </div>
 
    <div class="form-group">
      <label for="lastname" class="col-md-2">
        Last Name:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="lastname" name="lastname"  placeholder="Enter Last Name">
      </div>
 
 
    </div>
 
    <div class="form-group">
      <label for="emailaddress" class="col-md-2">
        Email address:
      </label>
      <div class="col-md-10">
        <input type="email" class="form-control" id="emailaddress" name="emailaddress"  placeholder="Enter email address">
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
        <input type="text" class="form-control" id="age" name="age"  placeholder="Enter the Age">
      </div>
    </div>
 
    <div class="form-group">
      <label for="Gender" class="col-md-2">
        Gender:
      </label>
      <div class="col-md-10">
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

   
    <div class="row">
     
      <div class="col-md-2">
        <input type="submit" style="{float: center}" name ="submit" class="btn btn-info" value="Register">
      </div>
    </div>
  </form>
  
 
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  </body>
</html>
