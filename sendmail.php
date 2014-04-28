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

  </head>
  <body>
   <form action="sendmail.php" method="post" >
    <div class="form-group">
      <label for="firstname" class="col-md-2">
        From:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="from" name="from" placeholder="Sender's Name">
      </div>
 
 
    </div>
	<div class="form-group">
      <label for="firstname" class="col-md-2">
        Subject:
      </label>
      <div class="col-md-10">
        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject">
      </div>
    </div>
	
 
    <div class="form-group">
      <label for="lastname" class="col-md-2">
       Message:
      </label>
      <div class="col-md-10">
	     <textarea name="message" rows="10" cols="150" placeholder="Message"></textarea>
    
      </div>
 </div>
 	  <div class="col-md-2">
			<input type="submit"  name ="send" class="btn btn-info" value="Send">
</div>
	  </form>
 <?php 

	include_once('dbconnect.php'); 
	
	
	$sql = "select firstname, lastname, emailaddress from registration_table";
	$result = mysql_query($sql, $link);
	
	if(!$result){
		die('Error:'.mysql_error());
	}
	
	if(isset($_POST['send'])){
	$message = $_POST['message'];
	$from = $_POST['from'];
	$subject = $_POST['subject'];
	ini_set("SMTP","aspmx.l.google.com");

		while($row = mysql_fetch_array($result)){

			mail($row['emailaddress'],$subject,"Dear ".$row['firstname']." ".$row['lastname'].",\n\n $message \n\nThanks and Regards\n$from");

		}
	}
?>

  </body>
  </html>
  