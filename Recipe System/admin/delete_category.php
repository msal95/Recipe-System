<?php

include "db.php";
$selected_record=$_REQUEST['cat_id'];

mysql_query("delete from `categories` where cat_id = '$selected_record' ") or die (mysql_error());

header("location:categories_list.php");
?>