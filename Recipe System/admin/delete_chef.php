<?php

include "db.php";
$selected_record=$_REQUEST['chef_id'];

mysql_query("delete from `chefs` where chef_id = '$selected_record' ") or die (mysql_error());

header("location:chef_list.php");
?>