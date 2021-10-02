<?php

include "db.php";
$selected_record=$_REQUEST['dish_id'];

mysql_query("delete from `dishes` where dish_id = '$selected_record' ") or die (mysql_error());

header("location:dishes_list.php");
?>