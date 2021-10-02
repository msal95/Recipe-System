
<?php include "db.php"; ?>

<!DOCTYPE html>
<html lang="en">

<!-- Skill Technologies Inc./members.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:18:24 GMT -->
<!-- Skill Technologies Inc. --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Skill Technologies Inc. -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>All Chefs</title>
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
				<a href="#">Home</a> &raquo; <span>All Chefs</span>
			</div>
			<div class="rw-row page-title">
				<h1>All Chefs</h1>
			</div>
			
			<div class="rw-row">
				<div class="members-list grid-container">
<?php
$query=mysql_query("SELECT * FROM `chefs` ");
do{
	$data=mysql_fetch_array($query);
	if($data){
	$chef_name=$data['chef_name'];
	$chef_photo=$data['chef_photo'];
?>
					<div class="member clearfix">
						<div class="user-avatar">
							<a href="#"><img src="admin/<?php echo $chef_photo; ?>" alt="" /></a>
						</div>
						<div class="user-details grid desk-7 mob-6 alpha clearfix">
							<div class="title clearfix">
								<a href="#" class="name"><?php echo $chef_name; ?></a>
							</div>
							<div class="info">
								<div class="info-item"><a href="#">368 recipes</a> / Last visit: 5 minutes ago</div>
								<div class="info-item user-reputation">
									<span class="count">8215</span>
									<span class="text">points</span>
								</div>
							</div>
						</div>
						<div class="user-follow grid desk-5 mob-6 omega clearfix">
							<a href="#" class="follow-user button blue">
								<i class="fa fa-plus"></i> <span class="text">Follow</span>
							</a><br>
							<a href="#" class="followers-count">1150 followers</a>
						</div>
					</div>

	<?php }} while ($data);?>			
					


					<div class="members-pagination button-block center">
						<a class="button small nobg primary" href="#">&larr; Prev</a>
						<a class="button small nobg primary" href="#">...</a>
						<span class="button small nobg primary current">4</span>
						<a class="button small nobg primary" href="#">5</a>
						<a class="button small nobg primary" href="#">6</a>
						<a class="button small nobg primary" href="#">...</a>
						<a class="button small nobg primary" href="#">192</a>
						<a class="button small nobg primary" href="#">Next &rarr;</a>
					</div>


				</div> <!-- .members-list -->				
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