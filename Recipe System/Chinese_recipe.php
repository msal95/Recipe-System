
<?php
	include "db.php";
?>

<!DOCTYPE html>
<html lang="en">

<!-- Skill Technologies Inc./recipes.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:16:18 GMT -->
<!-- Skill Technologies Inc. --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Skill Technologies Inc. -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Recipe Portal</title>

	<?php include "includes/meta.php"; ?>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
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
				<a href="#">Home</a> &raquo; <span>Chinese Recipes</span>
			</div>
			<div class="rw-row page-title">
				<h1>Chinese Recipes</h1>
			</div>
			
			

	
			<div class="rw-row">
				
				<div class="recipes-list">

					<!-- Entry -->
						
<?php
$query=mysql_query("SELECT * FROM `dishes` where country_name='Chinese' order by dish_id DESC ");
do{
	$data=mysql_fetch_array($query);
	if($data){
	$dish_name=$data['dish_name'];
	$dish_direction=$data['dish_direction'];
	$dish_photo=$data['dish_photo'];
	$chef_id=$data['chef_id'];
?>
					<div class="recipe clearfix">
						<div class="recipe-main-info clearfix">
							<div class="grid-container">
								
								<div class="entry-photo grid desk-4 alpha">
									<img src="admin/<?php echo $dish_photo; ?>" alt="" />
								</div>

								<div class="grid desk-8 omega">
									<div class="entry-title">
										<h2><a href="#"><?php echo $dish_name; ?></a></h2>
									</div>
									<div class="entry-controls minimal">
										<div class="control"> <i class="fa fa-calendar"></i> </div><span class="control-tip">04 August 2013</span>
										<a href="#" class="control entry-to-favorites" title="Add to favorites"> <i class="fa fa-heart-o"></i> </a><span class="control-tip">44</span>
										<a href="#" class="control entry-like" title="I like this!"> <i class="fa fa-thumbs-o-up"></i> </a> <span class="control-tip">294</span>
										<a href="#" class="control entry-comments" title="Comments"> <i class="fa fa-comments"></i> </a> <span class="control-tip">2 comments</span>
										<div class="control"> <i class="fa fa-bar-chart"></i> </div> <span class="control-tip">1810 views</span>
									</div>
									<div class="entry-content">
										<p><?php echo $dish_direction; ?></p>
									</div>
	<?php
		$chef_query = mysql_query("select * from `chefs` where chef_id = '$chef_id' ");
		
		$chef_data = mysql_fetch_array($chef_query);
		
		$chef_name = $chef_data['chef_name'];
		$chef_photo = $chef_data['chef_photo'];
	?>
									<div class="entry-info-author">
										<img src="admin/<?php echo $chef_photo; ?>" alt="" />
										<div class="author-name"><a href="#"><?php echo $chef_name; ?></a></div>
										<div class="total-recipes">220 recipes</div>
									</div>
									<div class="clear"></div>
								</div>

							</div> <!-- .grid-container -->
						</div>

					</div> <!-- .entry -->
					<?php }} while ($data);?>

					<div class="clear"></div>

				</div> <!-- .recipes-list -->
				

				<div class="recipes-pagination button-block center">
					<a class="button small nobg primary" href="#">&larr; Prev</a>
					<a class="button small nobg primary" href="#">...</a>
					<span class="button small nobg primary current">4</span>
					<a class="button small nobg primary" href="#">5</a>
					<a class="button small nobg primary" href="#">6</a>
					<a class="button small nobg primary" href="#">...</a>
					<a class="button small nobg primary" href="#">192</a>
					<a class="button small nobg primary" href="#">Next &rarr;</a>
				</div>


			</div>

		</div>

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

<!-- Skill Technologies Inc./recipes.php http://skilltechnologies.net/ Sat, 17 Jun 2017 09:17:08 GMT -->
</html>