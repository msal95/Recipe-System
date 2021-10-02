<?php

include "db.php";
$selected_record=$_REQUEST['u_id'];

mysql_query("delete from `user` where u_id = '$selected_record' ") or die (mysql_error());

header("location:user_list.php");
?>