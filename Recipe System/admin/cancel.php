<?php
	
	
	include "db.php";
	
	
		$selected_app = $_REQUEST['id'];
		
		
		mysql_query("UPDATE `request` set status = '2' where req_id = '$selected_app'");
		
		
		header("location: request_list.php");
	
	
	
?>