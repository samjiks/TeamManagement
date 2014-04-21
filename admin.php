<?php session_start();
if(!isset($_SESSION["username"])){
	header("Location: login.php");	
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
    <title>Revolutionary Life</title>
    <script src="js/jquery-2.1.0.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">


	<script>
		$(document).ready(function(){
		$("body").append(function(){
			$("#createid").empty();
			append_create();
		});
	});
	
		
	$(document).ready(function(){
		$("#create").click(function(){
		$("#createid").empty();
		append_create();
		});
	});
	
	
	
	$(document).ready(function(){
		$("#view").click(function(){
		$("#createid").empty();
			view();
		});
	});
	
	$(document).ready(function(){
		$("#update").click(function(){
		$("#createid").empty();
			update();
		});
	});
	
	$(document).ready(function(){
		$("#delete").click(function(){
		$("#createid").empty();
			deletes();
		});
	});		
	
	$(document).ready(function(){
	   $("#createteam").click(function(){
		$("#createid").empty();
			createteam();
		});
	});	
	
	$(document).ready(function(){
	$("#assignteam").click(function(){
		$("#createid").empty();
			assignteam();
		});
	});	

	$(document).ready(function(){
	$("#displayteam").click(function(){
		$("#createid").empty();
			displayteam();
		});
	});	
	
	$(document).ready(function(){
	$("#updateteam").click(function(){
		$("#createid").empty();
			updateteam();
		});
	});	
	
	$(document).ready(function(){
	$("#sendemail").click(function(){
		$("#createid").empty();
			sendmail();
		});
	});	
	
	
	function append_create(){
	 var firstname_label =  "<iframe src='http://localhost/revolutionary life/create.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(firstname_label);
     }
	 
	 function view(){
	 var view_label =  "<iframe src='http://localhost/revolutionary life/view.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }

	 function update(){
	 var view_label =  "<iframe src='http://localhost/revolutionary life/update.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	 
	 function deletes(){
	 var view_label =  "<iframe src='http://localhost/revolutionary life/delete.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	 
	 function createteam(){
	 var view_label =  "<iframe src='http://localhost/revolutionary life/createteam.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	 
	  function assignteam(){
	 var view_label =  "<iframe src='http://localhost/revolutionary life/assignteam.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	 
	  function displayteam(){
	 var view_label =  "<iframe src='http://localhost/revolutionary life/displayteam.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	 function updateteam(){
	 var view_label =  "<iframe src='http://localhost/revolutionary life/updateteam.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
	  function sendmail(){
	 var view_label =  "<iframe src='http://localhost/revolutionary life/sendmail.php' seamless scrolling='no' height='1000px' width='1000px'></iframe>";
    	$("#createid").append(view_label);
     }
</script>


    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse" role="navigation">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
       
          </button>
          <a class="navbar-brand" href="#">REVELATION: THE REAL ENCOUNTER 2014</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
			<li><a href="#">Help</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
			<?php  echo "Welcome, " . $_SESSION["username"];  ?>
          </form>
        </div>
   
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-2 sidebar">
		<div class="well">
		 <ul class="nav nav-list">
			<li class="nav-header">Manage Users</li> 
            <li class="active"><a class="active" id="create">Create New User</a></li>
            <li><a id="view">View User</a></li>
            <li><a id="update">Update User</a></li>
			 <li><a id="delete">Delete User</a></li>
			<li class="divider"></li>
			<li class="nav-header">Team Management</li>
            <li><a id="createteam">Create/Manage Team</a></li>
            <li><a id="assignteam">Assign Users to Team</a></li>
			<li><a id="updateteam">Update Users Team</a></li>
			<li><a id="displayteam">Display Team</a></li>
			<li class="divider"></li>
			<li class="nav-header">Settings</li>
            <li><a id="sendemail">Send Email to all users</a></li>
		    <li><a id="sendemail">Edit homepage</a></li>
			<li><a id="sendemail">Database settings</a></li>
            <li><a id="manageteam">Send SMS</a></li>
     
		  </div>
        </div>
		
        <div class="col" id="createid"></div>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <script src="js/bootstrap.min.js"></script>

  </body>
</html>
