

<?php
	session_start();
	if(!$_SESSION['u_id']){
	}
	include "db.php";
	
?>

<?php

if(isset($_POST['submit'])){
	$req_dishes=$_POST['req_dishes'];
	$u_id=$_POST['u_id'];
	
	$query=mysql_query("INSERT INTO `request` set req_dishes='$req_dishes',  u_id='$u_id'") or die(mysql_error());
	
	if($query == 1){
		header("Location:request_recipe.php?msg=ok");

	}elseif($query == 0){
		header("Location:request_recipe.php?msg=fail");
	}
		
		}

?>


<!DOCTYPE html>
<html lang="en">

<!-- Skill Technologies Inc./single-recipe.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:17:08 GMT -->
<!-- Skill Technologies Inc. --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Skill Technologies Inc. -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Single Recipe Page</title>
	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Dosis">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css" />
	<link rel="stylesheet" href="assets/fonts/awards/awards.css" />
	<link rel="stylesheet" href="assets/css/styles.css" />
	<?php include "includes/meta.php"; ?>
</head>
<body>
<section id="rw-layout" class="rw-layout">

<!--
// ===================================^__^=================================== //
   Header
// ===================================^__^=================================== //
-->
<?php include "includes/header.php"; ?>
<!--
// ===================================^__^=================================== //
   Content
// ===================================^__^=================================== //
-->
<div class="rw-section rw-container right-sidebar">
	<div class="rw-inner clearfix">

		
<!-- Sidebar -->
<?php include "includes/sidebar.php"; ?>

		<!-- Main content -->
		<div class="rw-column rw-content">
			
			<div class="rw-row page-breadcrumb">
				<a href="#">Home</a> &raquo; <a href="#">Recipes</a> &raquo; <span>Request A Recipe</span>
			</div>
			<div class="rw-row page-title">
				<h1>Request A Recipe</h1>
			</div>
			
						<?php 
					$msg = $_REQUEST['msg'];

					if($msg == 'ok'){

							header("location:index.php");
						?>
					<center>
					<h2 class="alert alert-success">Successfully Submitted !</h2>
					</center>
					<?php } if($msg == 'fail'){
						
						 header("refresh:1 ; url=request_recipe.php");
					?>
					<center>
					<h2 class="alert alert-danger">PLZ Try Again !</h2>
					</center>
					<?php } ?>
						
							<form class="form-horizontal col-md-offset-2" method="POST" action="" enctype="multipart/form-data">
								<div class="form-group">
									<label class="control-label col-md-3">User ID</label>
									<div class="col-md-7">
									<input type="text" name="u_id" value="<?php echo $_SESSION['u_id']; ?>"  class="form-control">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">Request Dishes</label>
									<div class="col-md-7">
									<input type="text" name="req_dishes" class="form-control">
									</div>
								</div>
								<div class="form-group">
										<label class="control-label col-md-7"></label>
										<div class="col-md-3">
										  <button type="submit" name="submit" style="background:#4186ba; color:#fff;" class="btn btn-primary" value="submit">Request a Recipe</button>
										</div>
									</div>
							</form>	
		</div> <!-- .rw-content -->

	</div> <!-- .rw-inner -->
</div> <!-- .rw-container -->

<!--
// ===================================^__^=================================== //
   Footer
// ===================================^__^=================================== //
-->
<?php include "includes/footer.php"; ?>

</section><!-- .rw-layout -->

<!-- Javascript -->
<script src="../../../code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="assets/js/min/smk-menu.min.js"></script>
<script src="assets/js/rw-sidebar.js"></script>
<script src="assets/js/min/jquery.qtip.min.js"></script>
<script src="assets/js/min/smk-accordion.min.js"></script>
<script src="assets/js/min/smk-visual-select.min.js"></script>
<script src="assets/js/min/owl.carousel.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>

<!-- Skill Technologies Inc./single-recipe.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:17:45 GMT -->
</html>