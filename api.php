<?php 
include_once('dbconnect.php');
	$tableName = "registration_table";
  $result = mysql_query("SELECT * FROM $tableName");          //query
   while($row = mysql_fetch_assoc($result))
  {
  $rows[]= $row;

  }


  //--------------------------------------------------------------------------
  // 3) echo result as json 
  //--------------------------------------------------------------------------
  echo json_encode($rows);
  
  

?>