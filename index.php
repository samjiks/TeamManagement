
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Revolutionary life - Living Stones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">

 
  <link rel="stylesheet" href="js/jquery-ui-1.10.4/themes/base/jquery-ui.css">
  <script src="js/jquery-ui-1.10.4/jquery-1.10.2.js"></script>
  <script src="js/jquery-ui-1.10.4/ui/jquery-ui.js"></script>
  
    <!-- Le styles -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

	<script type="text/javascript">
	function getdialog(){
		$("#dialog").dialog();
	}

</script>
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
              <li><a href="create.php">Registration</a></li>
              <li><a href="about.php">About us</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>


    <div class="container">
	    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="images/image.jpg" alt="" />
          <div class="container">
            <div class="carousel-caption">
            
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
    </div><!-- /.carousel -->

	
      <div id="dialog" style="display: none;" title="Feedback form">
        <form action="index.php" method="post" id="subForm">
         Please complete the form to sign up for the <a href="registration.php" target="_blank">
          <div class="input">
            <input type="text" name="cm-name" id="name" placeholder="Name" />
          </div>
          <div class="input">
            <input type="text" name="cm-nklki-nklki" id="nklki-nklki" placeholder="Email" />
          </div>
          <div class="input">
            <textarea name="cm-f-tlhll" id="Message" placeholder="Comments"></textarea>
          </div>
          <input type="submit" value="Get In Touch" /> <a href="#" class="close">Cancel</a>
        </form>
     </div>

      <!-- Three columns of text below the carousel -->

      <div class="row" >
        <div class="col-md-4">
         
          <h4>Feedback Form</h4>
          <p>Click below on the Button for the feedback</p>
          <p><input class="btn btn-default" id="feedback" onClick=getdialog() value="Feedback Form" ></p>
        </div><!-- /.col-lg-4 -->
		<div class="col-md-4">
     
          <h4>Prayer</h4>
          <p>Send us in your prayer requests</p>
          <p><a class="btn btn-default" name="prayer" href="#" role="button">Prayer Request</a></p>
        </div><!-- /.col-lg-4 -->

      </div><!-- /.row -->

	
      <hr>

      <footer>
        <p>&copy; REVERLATION: THE REAL ENCOUNTER 2014</p>
      </footer>


    </div> <!-- /container -->
	



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->


  </body>
</html>
