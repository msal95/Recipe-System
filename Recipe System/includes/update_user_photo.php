<?php
include "db.php";
$target_dir = "../uploads/";
$target_file = $target_dir . basename(rand(1, 999).rand(1000,9999 ).rand(1, 999)."_".$_FILES["u_photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$query="SELECT * FROM `user`" or die(mysql_error()) ;
$result=mysql_query($query);
$data=mysql_fetch_array($result);
if(isset($_POST['submit'])){
	$user_id=$_POST['user_id'];
}
// Check file size
if ($_FILES["u_photo"]["size"] > 5000000000000) {
   $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif"   && $imageFileType != "rtf" ) {
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["u_photo"]["tmp_name"], $target_file)) {
   $query="UPDATE `user` set u_photo = '$target_file' where u_id = '$user_id' ";
   
	header("refresh: 1; url=index.php");

		
	mysql_query($query) or die(mysql_error());
    } else {
         }
}

?>
						
						<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-4">User Photo</label>
									<div class="col-md-8">
									<input type="file" name="u_photo" class="form-control">
									<img src="uploads/<?php echo $data['u_photo']; ?>" width="300px" height="300px"/>
									</div>
								</div>
								<input type="hidden" name="user_id" value="<?php echo $data['u_id']; ?>"
								<div class="form-group">
										<label class="control-label col-md-4"></label>
										<div class="col-md-8">
										  <button type="submit" name="submit" style="background:#4186ba; color:#fff;" class="btn btn-default">Update</button>
										</div>
									</div>
							</form>