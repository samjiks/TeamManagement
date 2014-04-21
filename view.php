<? session_start();

echo "Welcome, " . $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Revolutionary life - Living Stones</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Registration Website">
    <meta name="author" content="Samuel Thampy">

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
	<script src="js/jquery-2.1.0.min.js"></script>

   <script>
 $(document).ready(function(){
  	   $("#pages").select(function() {
	    var pages = $( "#pages option:selected" ).val();
	         alert(pages);
	    });
	});
	 $(document).ready(function() {
	    var pages = $( "#pages option:selected" ).val();
	        
		$("#results").load("fetch_pages.php", {'page':0,'item_per_page':10}, function() {$("#1-page").addClass('active');});  

		$(".paginate_click").click(function (e) {
			
			$("#results").prepend('<div class="loading-indication"><img src="img/ajax-loader.gif" /> Loading...</div>');
			
			var clicked_id = $(this).attr("id").split("-"); 
			var page_num = parseInt(clicked_id[0]); 
			
			$('.paginate_click').removeClass('active'); 
			
			$("#results").load("fetch_pages.php", {'page': (page_num-1), 'item_per_page':10}, function(){

			});

			$(this).addClass('active');
			
			return false; //prevent going to herf link
		}); 
});
</script>
  </head>
<body>
<?php 
include_once('dbconnect.php');
		
	
		$result = mysql_query("SELECT * FROM registration_table", $link);
		$result_count = mysql_query("SELECT count(*) from registration_table", $link);
		
		$get_total_rows  = mysql_fetch_array($result_count);
	    $items_per_page = 10;
		$pages = ceil($get_total_rows[0]/$items_per_page);
		
		$pageresult = '';
		
		

		$pageresult.='<div class="pagination pagination-centered">';
		if($pages > 1){
			$pageresult.='<ul class="paginate">';
			for($i=0; $i < $pages;){
			++$i;
				 $pageresult.='<li><a href="#" class="paginate_click" id="'.$i.'-page">'.$i.'</a></li>';
			}
			$pageresult.='</ul>';
		}
		
		 $pageresult.='</div>';	
		 echo $pageresult; 
		 if (!$result) {
			die('Error: ' . mysql_error());
		}
	
?>
<span class="out"></span>
 <div id="results"></div>
</body>
</html>

