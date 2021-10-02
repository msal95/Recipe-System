
<?php
include "db.php";
?>


<!DOCTYPE html>
<html lang="en">

<!-- Skill Technologies Inc./members.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:18:24 GMT -->
<!-- Skill Technologies Inc. --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Skill Technologies Inc. -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About Us</title>
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
				<a href="#">Home</a> &raquo; <span>About Us</span>
			</div>
			<div class="rw-row page-title">
				<h1>About Us</h1>
				
				<?php
							$query="SELECT * FROM `about_us` " ;
							$result=mysql_query($query);
								$data=mysql_fetch_array($result);
								if($data){
									$id=$data['id'];
									$about=$data['about'];
								}
							?>
				
			</div>
			
			<div class="rw-row">
			<?php echo $about; ?>
			</div> <!-- .rw-row -->

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

<!-- Skill Technologies Inc./members.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:18:38 GMT -->
</html>