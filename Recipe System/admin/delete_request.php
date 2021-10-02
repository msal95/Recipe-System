<?php

include "db.php";
$selected_record=$_REQUEST['o_id'];

mysql_query("delete from `order` where o_id = '$selected_record' ") or die (mysql_error());

header("location:order_details.php");
?>