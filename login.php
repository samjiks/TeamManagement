<?php 
if(isset($_POST['submit'])){

	$username = $_POST['username'];
	$password = $_POST['password'];

	if($username == "admin" && $password == "admin"){
		session_start();
		$_SESSION["username"] = $username;
		header("Location: admin.php");	
	}else{
		echo "Username or password does not exist";
	}

}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title>Revelation Life 2014 - Sign In</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/signin.css" rel="stylesheet">
    <!-- Custom styles for this template -->
   

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
	<div class="row"></div>
	<div class="row">
	<p class="col-md-offset-1 col-md-4 lead"> Revelation 2014- Administration login </p>
	</div>
	<div class="row">

<form class="form-horizontal" action="login.php" method="POST" role="form">
  <div class="form-group">
    <label for="inputEmail3" class="col-md-2 control-label">Username</label>
    <div class="col-md-4">
      <input type="text" class="form-control" name="username" id="username" placeholder="Username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-md-2 control-label">Password</label>
    <div class="col-md-4">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-4">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
          <p id="error"></p>
      </div>
	     
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-md-offset-2 col-md-4">
      <input type="submit" name="submit" class="btn btn-warning btn-lg">
    </div>
  </div>
</form>
</div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>
