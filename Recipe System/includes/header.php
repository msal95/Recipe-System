<?php
include "db.php";
?>
<?php if($_SESSION['u_id']) { ?>
<div class="rw-section rw-header">
	<div class="rw-inner clearfix">
		<div class="grid-container">
<?php 
	$user=mysql_query("SELECT * FROM `user`");
	$data=mysql_fetch_array($user);
?>
			<div class="grid desk-8 mob-6 alpha clearfix">
				<div class="logo-holder">
					<img src="assets/placeholder/logo.png" class="logo" alt="" />
				</div>
				<nav id="the-main-menu" class="main-menu-nav menu-inline" data-breakpoint="1160">
					<ul class="menu horizontal">
						<li><a href="index.php">Home</a></li>
						<li><a href="chefs.php">Chefs</a></li>
						<li><a href="recipe.php">Recipe</a></li>
									
						<li>
							<a href="#">Categories</a>
							<ul class="sub-menu">
								<li><a href="pakistani_recipe.php">Pakistani Recipes</a></li>
								<li><a href="indian_recipe.php">Indian Recipes</a></li>
								<li><a href="chinese_recipe.php">Chinese Recipes</a></li>
								<li><a href="italian_recipe.php">Italian Recipes</a></li>
							</ul>
						</li>
						<li>
							<a href="#">More</a>
							<ul class="sub-menu">
								<li><a href="sweet_recipe.php">Sweets</a></li>
								<li><a href="continental_food.php">Continental Recipes</a></li>
							</ul>
						</li>

						<li><a href="about_us.php">About Us</a></li>
						<li><a href="contact.php">Contact Us</a></li>

					</ul>
				</nav>
			</div>
			<div class="grid desk-4 mob-6 omega">
				<nav id="the-user-menu" class="main-menu-nav">
					<ul class="menu horizontal align-right">

					


						<!-- Submission -->
						<li class="to-left-more">
							<a href="#" class="menu-single-icon"><i class="fa fa-plus"></i></a>
							<ul class="sub-menu">
								<li><a href="submit.php">Submit recipe</a></li>
								<li><a href="request_recipe.php">Request a recipe</a></li>
							</ul>
						</li>

						<!-- User menu -->
						<li class="to-left-more">
							<div class="user-details-in-menu">
								<a href="#" class="avatar"><img src="uploads/<?php echo $data['u_photo'] ?>" alt="" /></a>
							</div>
							<ul class="sub-menu">
								<li><a href="#update_modal<?php echo $data['u_id']; ?>" data-toggle="modal"><button type="button" class="btn btn-link" style="color:#fff; text-decoration:none; border:none;">Edit Profile</button></a></li>
								<li><a href="logout.php">Sign Out</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</div>

<!-- Update Photo Modal -->
		<div class="modal fade" id="update_modal<?php echo $data['u_id']; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background:#2a3744;">
						<button class="close" data-dismiss="modal">&times;</button>
							<h4>User Update Photo</h4>
						</div>
						<div class="modal-body">
<?php
$target_dir = "../uploads/";
$target_file = $target_dir . basename(rand(1, 999).rand(1000,9999 ).rand(1, 999)."_".$_FILES["u_photo"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$query=mysql_query("SELECT * FROM `user` where u_id='$data[u_id]'") or die(mysql_error()) ;

$userdata=mysql_fetch_array($query);
if(isset($_POST['update'])){
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
   $update=mysql_query("UPDATE `user` set u_photo = '$target_file' where u_id = '$user_id' ") or die(mysql_error());
  //var_dump($update); exit; 
	header("refresh: 1; url=index.php");

		
	mysql_query($update) or die(mysql_error());
    } else {
         }
}

?>
						
						<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-4">User Photo</label>
									<div class="col-md-8">
									<input type="file" name="u_photo" class="form-control" value="<?php echo $userdata['u_photo']; ?>">
									<img src="uploads/<?php echo $userdata['u_photo']; ?>" width="300px" height="300px"/>
									</div>
								</div>
								<input type="text" name="user_id" value="<?php echo $userdata['u_id']; ?>"
								<div class="form-group">
										<label class="control-label col-md-4"></label>
										<div class="col-md-8">
										  <button type="submit" name="update" style="background:#4186ba; color:#fff;" class="btn btn-default">Update</button>
										</div>
									</div>
							</form>
						</div>
						<div class="modal-footer" style="background:#2a3744;">
							<button class="close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		 </div>
	<!-- End Update Photo Modal -->
		</div> <!-- .grid-container -->
	</div> <!-- .rw-inner -->
</div> <!-- .rw-header -->




<?php } elseif(!$_SESSION['u_id']) { ?>
<?php

	$flg_submit = false;
	
	$flg_login = 0;
	
	if(isset($_POST['login'])){
				
		$flg_submit = true;
		
		$u_email = $_POST['u_email'];
		$u_pass = $_POST['u_pass'];
		
		
		$result = mysql_query("SELECT * FROM `user` where u_email = '$u_email' AND u_pass = '$u_pass'") or die(mysql_error());
		
			if(mysql_num_rows($result)){
				
				$row = mysql_fetch_assoc($result);
				
				$flg_login = 1;
				
				
				$_SESSION['u_id'] = $row['u_id'];
				
				header("location:index.php");
			}
			else{
				echo "Wrong Detail";
			}
	}
?>

<div class="rw-section rw-header">
	<div class="rw-inner clearfix">
		<div class="grid-container">

			<div class="grid desk-8 mob-6 alpha clearfix">
				<div class="logo-holder">
					<img src="assets/placeholder/logo.png" class="logo" alt="" />
				</div>
				<nav id="the-main-menu" class="main-menu-nav menu-inline" data-breakpoint="1160">
					<ul class="menu horizontal">
						<li><a href="index.php">Home</a></li>
						<li><a href="chefs.php">Chefs</a></li>
						<li><a href="recipe.php">Recipe</a></li>
									
						<li>
							<a href="#">Categories</a>
							<ul class="sub-menu">
								<li><a href="pakistani_recipe.php">Pakistani Recipes</a></li>
								<li><a href="indian_recipe.php">Indian Recipes</a></li>
								<li><a href="chinese_recipe.php">Chinese Recipes</a></li>
								<li><a href="italian_recipe.php">Italian Recipes</a></li>
							</ul>
						</li>
						<li>
							<a href="#">More</a>
							<ul class="sub-menu">
								<li><a href="sweet_recipe.php">Sweets</a></li>
								<li><a href="continental_food.php">Continental Recipes</a></li>
							</ul>
						</li>

						<li><a href="about_us.php">About Us</a></li>
						<li><a href="contact.php">Contact Us</a></li>

					</ul>
				</nav>
			</div>
			<div class="grid desk-4 mob-6 omega">
				<nav id="the-user-menu" class="main-menu-nav">
					<ul class="menu horizontal align-right">
						<li><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#mymodal">Login</button>&nbsp;&nbsp;&nbsp;</li>
						<li><button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#signup_modal">Signup</button></li>
					</ul>
				</nav>
			
	<!-- Login Modal -->
		<div class="modal fade" id="mymodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background:#2a3744;">
						<button class="close" data-dismiss="modal">&times;</button>
							<h4>User Login Panel</h4>
						</div>
						<div class="modal-body">
							<form class="form-horizontal col-md-offset-2" method="POST"  action="">
							<h4  style="color:#2a3744;">Please Login Here..</h4>
								<div class="form-group">
									<div class="col-md-8">
									  <input type="email" name="u_email" class="form-control" Placeholder="Email" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-8">
									  <input type="password" name="u_pass" class="form-control" Placeholder="Password" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-4"></label>
									<div class="col-md-8">
									  <button type="submit" name="login" style="background:#4186ba; color:#fff;" class="btn btn-primary" value="submit">LOGIN</button>
									</div>
								</div>
							</form>
						</div>
						<div class="modal-footer" style="background:#2a3744;">
							<button class="close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		 </div>
	<!-- End Login Modal -->

	
<!-- Signup Modal -->
		<div class="modal fade" id="signup_modal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background:#2a3744;">
						<button class="close" data-dismiss="modal">&times;</button>
							<h4>User SignUp Panel</h4>
						</div>
						<div class="modal-body">
							<?php include "includes/signup.php"; ?>
						</div>
						<div class="modal-footer" style="background:#2a3744;">
							<button class="close" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
		 </div>
	<!-- End Signup Modal -->
	
	

		</div> <!-- .grid-container -->
	</div> <!-- .rw-inner -->
</div> <!-- .rw-header -->

<?php } ?>