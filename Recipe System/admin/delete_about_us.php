<?php

include "db.php";
$selected_record=$_REQUEST['id'];

mysql_query("delete from `about_us` where id = '$selected_record' ") or die (mysql_error());

header("location:about_us_list.php");
?>