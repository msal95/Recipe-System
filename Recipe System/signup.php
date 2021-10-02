
<?php
include "db.php";
$target_dir="uploads/";
$target_file=$target_dir . basename(rand(1,999) . rand(1000,9999) . rand(1,999) . "_" . $_FILES["u_photo"]["name"]);
$uploadok=1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST['submit']))
{
	$u_name=$_POST['u_name'];
	$u_email=$_POST['u_email'];
	$u_pass=$_POST['u_pass'];
}
// Check File Size
if($_FILES["u_photo"]["size"]>50000000000000){
	$uploadok=0;
}
// allow certain files formates
if($imageFileType !="jpg" && $imageFileType !="jpeg" && $imageFileType !="gif" && imageFileType !="png"){
	$uploadok=0;
}
// check if $uploadok isset to 0 by an error
if($uploadok==0){
	
}else{
	if(move_uploaded_file($_FILES["u_photo"]["tmp_name"], $target_file)){
			$query="INSERT INTO `user` set u_name='$u_name', u_email='$u_email', u_pass='$u_pass', u_photo='$target_file'";
		mysql_query($query) or die(mysql_error());
	}else{
	}
}
?>
	